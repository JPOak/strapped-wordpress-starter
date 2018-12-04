const CleanWebpackPlugin = require('clean-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const merge = require('webpack-merge');
const commonConfig = require('./common.config');
const path = require('path');

module.exports = merge(commonConfig, {

	output: {
		path: path.resolve(__dirname, '../../dist/scripts'),
		filename: 'main.js'
	},
	devtool: false,
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
				test: /\.scss$/,
					use: [
						{
								loader: MiniCssExtractPlugin.loader, options: {
								}
						},
						{
								loader: 'css-loader', options: {
										sourceMap: false
								}
						},
						{
								loader: 'postcss-loader', options: {
										sourceMap: false,
										config: {
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
      new CleanWebpackPlugin(['../../dist/scripts/*.map', '../../dist/styles/*.map'], {allowExternal: true
      }),
      new MiniCssExtractPlugin({
        filename: "../styles/[name].css"
        //chunkFilename: "[id].css"
      }),
      new CopyWebpackPlugin([{
        from: path.resolve(__dirname, '../assets/images'),
        to: path.resolve(__dirname, '../../dist/images')
      }]),
      new ImageminPlugin({
				test: /\.(jpe?g|png|gif|svg)$/i,
				cacheFolder: path.resolve(__dirname, '../../.cache'),
				//For more about image settings: https://github.com/Klathmon/imagemin-webpack-plugin
				pngquant: { quality: '90', speed: 4},
				jpegtran: { progressive: true },
				gifsicle: { optimizationLevel: 1 },
				svgo: {}
      })
    ]

});//Config end
