const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const path = require('path');

module.exports = function(env, argv) {

  return {
    entry: [path.resolve(__dirname, '../assets/scripts/main.js'), path.resolve(__dirname, '../assets/styles/_main.scss')],
    output: {
        path: path.resolve(__dirname, '../../dist/scripts'),
        filename: 'main.js'
    },
    performance: {
      hints: false
    },
    devtool: argv.mode === 'production' ? false : 'source-map',
    optimization: {
        minimizer: [
        new UglifyJsPlugin({
          parallel: true,
          extractComments: true,
          sourceMap: false
        }),
        new OptimizeCSSAssetsPlugin({})//Compiles Sass to CSS minifies and removes maps in production
        ]
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: 'babel-loader',
                exclude: /node_modules/
            },
            {
                test: /\.scss$/,
                    use: [
                        {
                            loader: MiniCssExtractPlugin.loader, options: {
                            }
                        },
                        {
                            loader: 'css-loader', options: {
                                sourceMap: argv.mode === 'production' ? false : true
                            }
                        },
                        {
                            loader: 'postcss-loader', options: {
                                sourceMap: argv.mode === 'production' ? false : true,
                                config: {
                                  path: 'src/build/'
                                }
                            }
                        },
                        {
                            loader: 'sass-loader',  options: {
                                sourceMap: argv.mode === 'production' ? false : true
                            }
                        }
                    ]
            }
        ]
    },
    plugins: [
      new CleanWebpackPlugin(argv.mode === 'production' ? ['../../dist/scripts/*.map', '../../dist/styles/*.map'] : ['../../dist/scripts/*.LICENSE'], {allowExternal: true
      }),
      new MiniCssExtractPlugin({
          filename: "../styles/[name].css"
          //chunkFilename: "[id].css"
      }),
      new BrowserSyncPlugin({
          files: ['./*.php', './template-parts/*.php', './page-templates/*.php'],
          host: 'localhost',
          port: 4000,//Change to any port you want
          //URL of local development server goes below (ex. http://yourdomain.loc)
          proxy: 'http://strapped.loc/'
      }),
      new CopyWebpackPlugin([{
          from: path.resolve(__dirname, '../assets/images'),
          to: path.resolve(__dirname, '../../dist/images')
      }]),
      new ImageminPlugin({
          disable: argv.mode === 'production' ? false : true,//Disable during development
          test: /\.(jpe?g|png|gif|svg)$/i,
          cacheFolder: path.resolve(__dirname, '../../.cache'),
          //For more about image settings: https://github.com/Klathmon/imagemin-webpack-plugin
          pngquant: { quality: '90', speed: 4},
          jpegtran: { progressive: true },
          gifsicle: { optimizationLevel: 1 },
          svgo: {}
      }),
      new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery'
      })
    ]
  };

};//Config end
