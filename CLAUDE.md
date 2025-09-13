# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a media server for Der Reiskoch & ahaan-thai.de food blogs, serving as a static asset hosting solution. The main site redirects to https://www.der-reiskoch.de, while this repository hosts optimized images and media files.

## Development Commands

```bash
# Install dependencies
npm install

# Start local development server (serves on port 9090)
npm start

# Run Claude Code
npm run claude
```

## Architecture

- **Static Media Server**: Serves optimized images and assets for Hugo-based food blogs
- **Node.js**: Uses Node.js 20.19.3 (specified in .nvmrc)
- **http-server**: Simple HTTP server for local development and static file serving
- **Apache Configuration**: .htaccess file sets aggressive caching (1 year) for image assets

## Directory Structure

- `media/`: Main media assets organized by content type (e.g., `_kochbuch`, `_newsletter`, `_maps`)
- `logo/`: Brand logos and visual identity assets
- `index.html`: Simple redirect to main website
- `.htaccess`: Apache configuration for optimal image caching headers

## Image Optimization

Images are automatically optimized for web delivery via lint-staged scripts. The server is configured to serve images with:

- 1-year cache expiration
- Immutable cache-control headers
- Support for modern formats (webp, jpg, png)

## Deployment

This appears to be an auto-deployment setup based on git commit history showing "auto-deploy: added new images" pattern.
