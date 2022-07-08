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