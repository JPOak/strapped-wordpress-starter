const ImageminPlugin = require('imagemin-webpack-plugin').default;
const imageminMozjpeg = require('imagemin-mozjpeg');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('css-minimizer-webpack-plugin');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const fileExists = require('file-exists');
const { merge } = require('webpack-merge');
const commonConfig = require('./common.config');
const path = require('path');

//Check for config-local file, else use config-default
const checkConfig = fileExists.sync(path.resolve(__dirname, './config-local.json'));
const configPath = (checkConfig === true) ? './config-local.json' : './config-default.json';

const configDefault = require(configPath);

//Conditionally use asset hashing
const revisioning = (configDefault.revisioning === true) ? '[name]_[contenthash]' : '[name]';

module.exports = merge(commonConfig, {

	output: {
		path: path.resolve(__dirname, '../../dist/scripts'),
		filename: revisioning + '.js',
		clean: true
	},
	devtool: false,
	optimization: {
		minimizer: [
		new TerserPlugin({
			parallel: true,
			extractComments: true
		}),
		new OptimizeCSSAssetsPlugin({})//Compiles Sass to CSS minifies and removes maps in production
		]
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
					use: [
						{
								loader: MiniCssExtractPlugin.loader, options: {
								}
						},
						{
								loader: 'css-loader', options: {
										sourceMap: false,
										url: false
								}
						},
						{
								loader: 'postcss-loader', options: {
										sourceMap: false,
										postcssOptions: {
											path: 'src/build/'
										}
								}
						},
						{
								loader: 'sass-loader',  options: {
										sourceMap: false
								}
						}
					]
			}
		]
	},
    plugins: [
      new MiniCssExtractPlugin({
        filename: '../styles/' + revisioning + '.css'
        //chunkFilename: "[id].css"
			}),
			new WebpackAssetsManifest({
				output: '../manifest.json',
				//strip out output path from MiniCssExtractPlugin
				customize(entry, original, manifest, asset) {
					entry.value = path.basename( entry.value );
				}
			}),
			new CopyWebpackPlugin({
				patterns: [
					{ from: path.resolve(__dirname, '../assets/images'), to: path.resolve(__dirname, '../../dist/images') },
				],
			}),
      new ImageminPlugin({
				test: /\.(jpe?g|png|gif|svg)$/i,
				cacheFolder: path.resolve(__dirname, '../../.cache'),
				//For more about image settings: https://github.com/Klathmon/imagemin-webpack-plugin
				pngquant: { quality: '90', speed: 4},
				jpegtran: {},
				gifsicle: { optimizationLevel: 1 },
				svgo: {},
				plugins: [
					imageminMozjpeg({
							quality: 70,
							progressive: true,
					}),
			],
      })
    ]

});//Config end
