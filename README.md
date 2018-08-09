# Google SpreadSheet Test

## First, get client_secret.json
- create project (or using exists) on [Console](https://console.developers.google.com/apis/dashboard)
- Enable Google Sheets API
- Goto Credentials. Create a Service account key.
- download credential json rename to client_secret.json put to root folder.

## Create Sheet, share it with service account
- open client_secret.json, find client_email and copy its value.
- create a google sheet, share it with client_email.
- test!