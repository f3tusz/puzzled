# Troubleshooting

### Can't compile the theme assets
- Check if you have your `.env` file setup correctly. 
- Check if you have the latest stable node and npm version.
- Install it again, but first you need to remove the `node_modules` folder: `rm -rf node_modules/`.
- If a `package-lock.json` has been generated, delete it again. 
- Run the command `npm i`.
- Run the command `npm run watch`.

### Having issues running Nylon locally
- Check your PHP version is 7.3 or greater.
- Verify your MySQL version is 5.6 or greater.
- Check you're running Apache or Nginx on your machine. 
- Verify that you have your local-config.php on the webroot folder.
- Check if you downloaded the last version of WordPress on the webroot folder.