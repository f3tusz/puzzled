

let request = require('request');
let critical = require('critical');
let sass = require('node-sass');
let fs = require('fs');
let tmp = require('tmp');
require('dotenv').load();

const STAGING_DOMAIN = process.env.STAGING_URL
      PROXY = process.env.PROXY
      THEME_NAME = process.env.THEME_NAME
      STAGING_URL = `http://uptrending:trendup21@${STAGING_DOMAIN}/` 


// TODO: Change the ROOT_URL for each env DEV and PRODUCTION.
let ROOT_URL = STAGING_URL,
    BASE = `webroot/wp-content/themes/${THEME_NAME}/assets/critical/`,
    HTML_FILE, 
    CSS_FILE 


function getHTML(){
  return new Promise((resolve, reject)=> {
    request(ROOT_URL, function(err, res, body){
      HTML_FILE = tmp.fileSync({  prefix: 'critical-', postfix: '.html', keep: true });

      fs.writeFile(HTML_FILE.name, body, function(err){
        if(!err){
          resolve(HTML_FILE.name) 
        } else {
          reject(err)
        }
      })
    })
  })
}

function compileSASS(){
  return new Promise((resolve, reject)=> {
    sass.render({
      file: `${__dirname}/webroot/wp-content/themes/${THEME_NAME}/assets/scss/main.scss`
    }, function(err, result) {
      if(err){
        reject(err)
      }
      CSS_FILE = tmp.fileSync({  prefix: 'critical-', postfix: '.css', keep: true });
        fs.writeFile(CSS_FILE.name, result.css, function(err){
          if(err) throw err;
          resolve(CSS_FILE.name)
        })
    });
  })
}

function generateCriticalCSS(){
  critical.generate({
    inline: false,
    base: BASE,
    src: HTML_FILE.name,
    css: CSS_FILE.name,
    dest: 'main.css',
    width: 1300,
    height: 900,
    user: 'uptrending',
    pass: 'trendup21'
  }).then(function (output) {
    console.log('-- Critical CSS was generated successfully! --') 
  }).error(function (err) {
    console.error('-- There was an error while creating critical css: ', err)
  })
}

// Get the compiled files and then generate the critical CSS. 
getHTML().then(() => {
  compileSASS().then(()=> {
    console.log('-- both files were created successfully -- ')
    generateCriticalCSS()
  })
}).catch((err)=> {
  console.log(err)
})

/* 

const penthouse = require('penthouse')
const fs = require('fs')
const axios = require('axios');

axios.get('https://www.chirotouch.com/wp-content/themes/chirotouch/assets/build/master.css')
  .then(response => {
    
    const css = response.data;

    console.log(css);

    getCritical(css);
  })
  .catch(error => {
    console.log(error);
  });



function getCritical(css){
    penthouse({
        url: 'https://www.chirotouch.com',
        cssString: css
    })
    .then(criticalCss => {
        // use the critical css
        fs.writeFileSync('outfile.css', criticalCss);
    });
}

*/