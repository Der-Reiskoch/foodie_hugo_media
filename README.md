# Foodie Media Server

## Getting Started

- perform `npm install`

## Start Locally

```
npm run start
```

## Image Optimization

Images are optimized for web via lint-staged script

## Deployment to webspace

This will be deployed to the webspace via git-ftp

[![Deploy via git-ftp](https://github.com/Der-Reiskoch/foodie_public/actions/workflows/deploy-with-git-ftp.yml/badge.svg)](https://github.com/Der-Reiskoch/foodie_public/actions/workflows/deploy-with-git-ftp.yml)

## Generating WebPs

For older image folders without webP files you can perform `npm run generateWebPs` to generate those optimised images per folder. just follow the questions asked in the CLI.

To be able to do so [cwebp](https://developers.google.com/speed/webp/download) has to be installed
(For example via Homebrew: `brew install webp`).

## Using Imagekit

- zz3378 = tr:w-600h-450:ot-%20%20Der%20Reiskoch,otc-5a781d80,otbg-bbbbbb50,otf-ubuntu,ott-b,ots-20pt,otia-left,otp-1,otw-600,oy-600
- bb49ee = tr:w-1200h-900:ot-%20%20Der%20Reiskoch,otc-5a781d80,otbg-bbbbbb50,otf-ubuntu,ott-b,ots-24pt,otia-left,otp-1,otw-1200,oy-1200
- cx54se = tr:w-1600h-1200:ot-%20%20Der%20Reiskoch,otc-5a781d80,otbg-bbbbbb50,otf-ubuntu,ott-b,ots-26pt,otia-left,otp-1,otw-1600,oy-1600
