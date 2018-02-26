var path = require('path');
var webpack = require('webpack');
var assetPath = './assets/js';

module.exports = {
  entry: {
    app: [
      `${assetPath}/general-scripts.js`,
      `${assetPath}/vueModules/form.js`,
    ]
  },
  output: {
    path: path.join(__dirname, './build'),
    filename: 'bundle.js',
  },
  resolve: {
    extensions: ['.js']
  },
  module: {
    loaders: [{
      test: /(\.js|.jsx)$/,
      loader: 'babel-loader',
      exclude: '/node_modules/',
      query: {
        presets: ['es2015']
      }
    }]
  }
}
