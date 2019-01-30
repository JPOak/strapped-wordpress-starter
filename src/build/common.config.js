const webpack = require('webpack');
const path = require('path');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');

module.exports = {

	entry: [path.resolve(__dirname, '../assets/scripts/main.js'), path.resolve(__dirname, '../assets/styles/_main.scss')],
	performance: {
		hints: false
	},
	stats: {
		hash: false,
		version: false,
		timings: false,
		children: false,
		chunks: false,
		modules: false,
		source: false,
		publicPath: false
	},
	module: {
		rules: [
			{
					test: /\.js$/,
					use: 'babel-loader',
					exclude: /node_modules/
			}
		]
	},
	plugins: [
		new FriendlyErrorsWebpackPlugin(),
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		})
	]

};//Config end
