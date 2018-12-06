const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');
const merge = require('webpack-merge');
const commonConfig = require('./common.config');
const path = require('path');

module.exports = merge(commonConfig, {

	output: {
			path: path.resolve(__dirname, '../../dist/scripts'),
			filename: 'main.js'
	},
	devtool: 'source-map',
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
										sourceMap: true,
										url: false
								}
						},
						{
								loader: 'postcss-loader', options: {
										sourceMap: true,
										config: {
											path: 'src/build/'
										}
								}
						},
						{
								loader: 'sass-loader',  options: {
										sourceMap: true
								}
						}
					]
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(['../../dist'], {allowExternal: true
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
		}])
	]

});//Config end
