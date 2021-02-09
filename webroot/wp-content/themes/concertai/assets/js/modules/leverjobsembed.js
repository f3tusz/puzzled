window.loadLeverJobs = function (options) {
  if (options == undefined){
    return false;
  }
  //Checking for potential Lever source or origin parameters
  var pageUrl = window.location.href;
  var applyUrl = pageUrl.replace('open-jobs/', 'job-posting/');
  var detailUrl = pageUrl.replace('open-jobs/', 'job-posting/');
  var leverParameter = '';
  var trackingPrefix = '?lever-';
  options.accountName = options.accountName.toLowerCase();
  // Define the container where we will put the content (or put in the body)
  var jobsContainer = document.getElementById("lever-jobs-container") || document.body;

  if( pageUrl.indexOf(trackingPrefix) >= 0){
    // Found Lever parameter
    var pageUrlSplit = pageUrl.split(trackingPrefix);
    leverParameter = '?lever-'+pageUrlSplit[1];
  }

  var htmlTagsToReplace = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;'
  };

  function replaceTag(tag) {
      return htmlTagsToReplace[tag] || tag;
  }

  //For displaying titles that contain brackets in the 'append' function
  function sanitizeForHTML(str) {
      if (typeof str == 'undefined' ) {
        return '';
      }
      return str.replace(/[&<>]/g, replaceTag);
  }

  //Functions for checking if the variable is unspecified and removing script tags + null check
  //For making class names from department and team names
  function sanitizeAttribute(string) {
    if (string == '' || typeof string == 'undefined' ) {
      return 'uncategorized';
    }
    string = sanitizeForHTML(string);
    return string.replace(/\s+/ig, "");
  }

  // get a URL Query Parameter, useful for single job post so we can find the job ID
  function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  };
  // Adding the account name to the API URL
  slug = "?group=team&mode=json";
  //console.log(typeof(getUrlParameter('jobid')));
  if (options.fx == 'createjobs') {
  } 
  else if (options.fx == 'singlejob') {
    if (getUrlParameter('jobid').length > 0){
      slug = sanitizeAttribute(getUrlParameter('jobid'));
    } else {
      slug = '0';
    }
  } 
  var url = 'https://api.lever.co/v0/postings/' + options.accountName + '/' + slug;

  //console.log('url is ' + url);
  //Create an object ordered by department and team
  function createJobs(responseData) {
    if (!responseData) return;

    //Older versions of IE might not interpret the data as a JSON object
    if(typeof responseData === "string") {
      responseData = JSON.parse(responseData);
    }

    var content = "";
    var groupedPostings = [];

    for(var i = 0; i < responseData.length; i++) {
      if (!responseData[i]) continue;
      if (!responseData[i].postings) continue;
      if (!(responseData[i].postings.length > 0)) continue;

      var title = sanitizeForHTML(responseData[i].title || 'Uncategorized');
      var titlesanitizeAttribute = sanitizeAttribute(title);

      for (j = 0; j < responseData[i].postings.length; j ++) {
        var posting = responseData[i].postings[j];
        var team = (posting.categories.team || 'Uncategorized' );
        var teamsanitizeAttribute = sanitizeAttribute(team);
        var department = (posting.categories.department || 'Uncategorized' );
        var departmentsanitizeAttribute = sanitizeAttribute(department);
        var link = posting.hostedUrl+leverParameter;

        function findDepartment(element) {
          return element.department == departmentsanitizeAttribute;
        }

        if (groupedPostings.findIndex(findDepartment) === -1) {

          newDepartmentToAdd = {department : departmentsanitizeAttribute, departmentTitle: department, teams : [ {team: teamsanitizeAttribute, teamTitle: team, postings : []} ] };
          groupedPostings.push(newDepartmentToAdd);
        }
        else {

          departmentIndex = groupedPostings.findIndex(findDepartment);
          newTeamToAdd = {team: teamsanitizeAttribute, teamTitle: team, postings : []};

          if (groupedPostings[departmentIndex].teams.map(function(o) { return o.team; }).indexOf(teamsanitizeAttribute) === -1) {
            groupedPostings[departmentIndex].teams.push(newTeamToAdd);
          }
        }
        function findTeam(element) {
          return element.team == teamsanitizeAttribute;
        }
        departmentIndex = groupedPostings.findIndex(findDepartment);
        teamIndex = groupedPostings[departmentIndex].teams.findIndex(findTeam);
        groupedPostings[departmentIndex].teams[teamIndex].postings.push(posting);

      }

    }

    // Sort by department
    groupedPostings.sort(function(a, b) {
      var departmentA=a.department.toLowerCase(), departmentB=b.department.toLowerCase()
      if (departmentA < departmentB)
          return -1
      if (departmentA > departmentB)
          return 1
      return 0
    });

    for(var i = 0; i < groupedPostings.length; i++) {

      // If there are no departments used, there is only one "unspecified" department, and we don't have to render that.
      if (groupedPostings.length >= 2) {
        var haveDepartments = true;
      };

      if (haveDepartments) {
        content += '<section class="lever-department" data-department="' + groupedPostings[i].departmentTitle + '"><h3 class="lever-department-title">' + sanitizeForHTML(groupedPostings[i].departmentTitle) + '</h3>';
      };

      for (j = 0; j < groupedPostings[i].teams.length; j ++) {

        content += '<ul class="lever-team" data-team="' + groupedPostings[i].teams[j].teamTitle + '"><li class="col-12 col-lg-10 col-lg-offset-2"><h4 class="lever-team-title">' + sanitizeForHTML(groupedPostings[i].teams[j].teamTitle) + '</h4><ul>';

        for (var k = 0; k < groupedPostings[i].teams[j].postings.length; k ++) { 
        var jobID = sanitizeForHTML(groupedPostings[i].teams[j].postings[k].id || '');
        var thisApplyUrl = applyUrl + '?jobid=' + jobID;
        var thisDetailUrl = detailUrl + '?jobid=' + jobID;


          content += '<li class="lever-job" data-department="' + groupedPostings[i].departmentTitle +'" data-team="' + groupedPostings[i].teams[j].postings[k].categories.team + '" data-location="' + groupedPostings[i].teams[j].postings[k].categories.location + '"data-work-type="' + groupedPostings[i].teams[j].postings[k].categories.commitment + '">' +
          '<a class="lever-job-title" href="' + thisDetailUrl + '"><span>' + sanitizeForHTML(groupedPostings[i].teams[j].postings[k].text) + '</span></a><a href="' + thisApplyUrl + '" class="lever-job-apply cta cta-small">Apply<svg class="arrow-svg" width="22" height="15" fill="none" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.4 14.2" style="enable-background:new 0 0 21.4 14.2;" xml:space="preserve"><polygon points="14.3,0 12.9,1.4 17.6,6.1 0,6.1 0,8.1 17.6,8.1 12.9,12.8 14.3,14.2 21.4,7.1 "/></svg></a><div class="lever-job-tag"><span>' + (sanitizeForHTML(groupedPostings[i].teams[j].postings[k].categories.location) || '') + '</span><span>' + (sanitizeForHTML(groupedPostings[i].teams[j].postings[k].categories.team) || '') + '</span><span>' + (sanitizeForHTML(groupedPostings[i].teams[j].postings[k].categories.commitment) || '') + '</span></div></li>';
        }

        content += '</ul></li></ul>';

      }
      if (haveDepartments) {
        content += '</section>';
      };
    }

    content += '</ul>';
    jobsContainer.innerHTML = content;
    window.dispatchEvent(new Event('leverJobsRendered'));
  }

  function singleJob(responseData) {
    var jobTitle = responseData.text;
    var commitment = responseData.categories.commitment;
    var location = responseData.categories.location;
    var team  = responseData.categories.team;
    var description = responseData.description;
    var lists = responseData.lists;
    var additional = responseData.additional;
    var jobID = responseData.id;

    // Step 1: Populate Job Meta fields
    var content = '';
    if (typeof(location) != 'undefined') {
      if (location.length > 0){
        content = location;
        if (team.length > 0 || commitment.length > 0){
          content += ' / ';
        }
        $('#job-location').text(content);
      }
    }
    if (typeof(team) != 'undefined') {
      if (team.length > 0){
        content = team;
        if (commitment.length > 0){
          content += ' / ';
        }
        $('#job-team').text(content);
      }
    }
    if (typeof(commitment) != 'undefined'){
      if (commitment.length > 0){
        $('#job-commitment').text(commitment);
      }
    }

    // Step 2: Populate Job Title and Apply Button
    $('#job-title').text(jobTitle);

    // Step 3: Populate the main stuff
    if (typeof(description) != 'undefined') {
      if (description.length > 0){
        document.getElementById('job-description').innerHTML = description;
      }
    }
    if (typeof(lists) != 'undefined') {
      if (lists.length > 0){
        var listContent = '';
        $.each(lists, function(key,value){
          listContent += '<section>';
          listContent += '<h3>' + value.text + '</h3>';
          listContent += '<ul>' + value.content + '</ul>';
          listContent += '</section>';
        });
        document.getElementById('job-lists').innerHTML = listContent;
      }
    }
    
    if (typeof(additional) != 'undefined') {
      if (additional.length > 0){
        document.getElementById('job-additional').innerHTML = additional;
      }
    }

    $('#jobLoading').hide();
    $('#jobLinks').show();
    $('#jobLoaded').show();
  }

  if (options.includeCss) {
    function addCss(fileName) {
      var head = document.head
        , link = document.createElement('link');

      link.type = 'text/css';
      link.rel = 'stylesheet';
      link.href = fileName;

      head.appendChild(link);
    }
    addCss('https://andreasmb.github.io/lever-jobs-embed/embed-css/style.css');
  }

  var request = new XMLHttpRequest();
  request.open('GET', url, true);
  request.responseType = "json";
  request.onload = function() {
    if (request.status == 200) {
      if (options.fx == 'createjobs'){
        createJobs(request.response);
      } else if (options.fx == 'singlejob'){
        singleJob(request.response);
      }
    } else if (request.status == 429){
      alert('Rate limited, too many application attempts');
    } else {
      console.log("Error fetching jobs.");
      console.log(request);
      jobsContainer.innerHTML = "<p class='lever-error'>Error fetching jobs.</p>" + request.status + request.statusText;
    }
  };

  request.onerror = function() {
    console.log("Error fetching jobs.");
    console.log(request);
    jobsContainer.innerHTML = "<p class='lever-error'>Error fetching jobs.</p>";
  };

  request.send();

};

window.loadLeverJobs(window.leverJobsOptions);



// IE polyfill for findIndex - found at https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/findIndex

if (!Array.prototype.findIndex) {
  Object.defineProperty(Array.prototype, 'findIndex', {
    value: function(predicate) {
     // 1. Let O be ? ToObject(this value).
      if (this == null) {
        throw new TypeError('"this" is null or not defined');
      }

      var o = Object(this);

      // 2. Let len be ? ToLength(? Get(O, "length")).
      var len = o.length >>> 0;

      // 3. If IsCallable(predicate) is false, throw a TypeError exception.
      if (typeof predicate !== 'function') {
        throw new TypeError('predicate must be a function');
      }

      // 4. If thisArg was supplied, let T be thisArg; else let T be undefined.
      var thisArg = arguments[1];

      // 5. Let k be 0.
      var k = 0;

      // 6. Repeat, while k < len
      while (k < len) {
        // a. Let Pk be ! ToString(k).
        // b. Let kValue be ? Get(O, Pk).
        // c. Let testResult be ToBoolean(? Call(predicate, T, « kValue, k, O »)).
        // d. If testResult is true, return k.
        var kValue = o[k];
        if (predicate.call(thisArg, kValue, k, o)) {
          return k;
        }
        // e. Increase k by 1.
        k++;
      }

      // 7. Return -1.
      return -1;
    },
    configurable: true,
    writable: true
  });
}

// IE Polyfill for New Event

(function () {

  if ( typeof window.CustomEvent === "function" ) return false;

  function CustomEvent ( event, params ) {
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    var evt = document.createEvent( 'CustomEvent' );
    evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
    return evt;
   }

  CustomEvent.prototype = window.Event.prototype;

  window.CustomEvent = CustomEvent;
})();
