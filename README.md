# Der Reiskoch & ahaan-thai.de Media Server

## Getting Started

- perform `npm install`

## Start Locally

```bash
npm run start
```

## Image Optimization

Images are optimized for web via lint-staged script

## Generating WebPs

For older image folders without webP files you can perform `npm run generateWebPs` to generate those optimised images foler wise. just follow the questions asked in the CLI.

To be able to do so [cwebp](https://developers.google.com/speed/webp/download) has to be installed
(For example via Homebrew: `brew install webp`).
