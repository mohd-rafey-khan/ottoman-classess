#SCSS

All styles used for project need to arrange as per the added folder structure. 

You can also add normal css code in the scss file.


## Main file

The main file (usually labelled `main.scss`) should be the only Sass file from the whole code base not to begin with an underscore. This file should not contain anything but `@import` and comments.

Reference: [Sass Guidelines](http://sass-guidelin.es/) > [Architecture](http://sass-guidelin.es/#architecture) > [Main file](http://sass-guidelin.es/#main-file)

## Sass Boilerplate

This is a sample project using the [7-1 architecture pattern](http://sass-guidelin.es/#architecture) and sticking to [Sass Guidelines](http://sass-guidelin.es) writing conventions.

Each folder of this project has its own `README.md` file to explain the purpose and add extra information. Be sure to browse the repository to see how it works.



## Command line usage to compile scss files:

To complile the scss files into final main css stylesheet we need to install below plugins:


```bash
npm install -g node-sass
npm install -g postcss postcss-cli
npm install -g postcss-cli autoprefixer
```

If there's any error like below, run below commands, where `sai` is the machine's username.

		Error: EACCES: permission denied, mkdir '/usr/local/lib/node_modules/node-sass/build'

```bash
sudo chown -R root:sai /usr/local/lib/node_modules/
sudo chmod -R 775 /usr/local/lib/node_modules/
```

To run build, run below from command line:

```bash
node-sass assets/scss/main.scss dist/css/main.css --source-map dist/css/main.css.map
```

To watch live changes and build css, run below from command line:

```bash
node-sass assets/scss/main.scss dist/css/main.css --source-map dist/css/main.css.map --watch
```

To compress the main.css need, run below from command line:

```bash
node-sass assets/scss/main.scss dist/css/main.css --source-map dist/css/main.css.map --output-style compressed
```

To process main.css for cross-browesets, run below from command line:

```bash
node-sass assets/scss/main.scss dist/css/main.css --source-map dist/css/main.css.map && postcss -u autoprefixer -b 'latest 2 versions' -o dist/css/main.css < dist/css/main.css --no-map
```

To compress the main.css and process it for cross-browsers, run below from command line:

```bash
node-sass --output-style compressed assets/scss/main.scss dist/css/main.css --source-map dist/css/main.css.map && postcss -u autoprefixer -b 'latest 2 versions' -o dist/css/main.css < dist/css/main.css --no-map
```
