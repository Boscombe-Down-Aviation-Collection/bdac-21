# bdac-21

Boscombe Down Aviation Collection Theme 2021 updating the Collection's online presence

## Introduction

The purpose of this project is to create a WordPress theme that allows patrons and members of Boscombe Down Aviation Collection to see and interact with the Collection. This will include a preview of the exhibits, details of upcoming and past events as well as providing an online shop to purchase tickets, book events and in the future shop items. 

- Run initial setup 'npm install', at this point there will be no css or js files found
- If development 'npm run start', this will output compressed JS but uncompressed CSS
- If production 'npm run build' this will output compressed JS and CSS

### Build Tools

- HTML
- CSS
- JavaScript
- PHP
- Bootstrap
- Webpack

## Basic Setup

### Prerequisites

Ensure that both Node and NPM are installed on your machine the following commands in the terminal.

```
node -v
npm -v
```

### Installation

1. Install the project dependencies

```
npm install
```

2. For Development

```
npm run start
```

This will compile all the necessary docs into a `dist` folder for the theme to use. The project will then auto detect changes to any of the files within the inc folder and recompile with each save.

You can then view the theme at the location of your local WordPress installation.

5. For Production

```
npm run build
```

This will compile all necessary docs into a `dist` folder for the theme. This runs once only and does not update any changes made within the `inc` folder unless `npm run build` is run again in the terminal.