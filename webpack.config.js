var path = require('path');
 
module.exports = {
    entry: "./resources/js/index.js", // входная точка - исходный файл
    output:{
        path: path.resolve(__dirname, './resources/'),     // путь к каталогу выходных файлов - папка public
        publicPath: '/resources/',
        filename: "bundle.js"       // название создаваемого файла
    },
    module:{
        rules:[   //загрузчик для jsx
            {
                test: /\.js?$/, // определяем тип файлов
                exclude: /(node_modules)/,  // исключаем из обработки папку node_modules
                loader: "babel-loader",   // определяем загрузчик
                // options:{
                //     presets:["@babel/preset-env", "@babel/preset-react"]    // используемые плагины
                // }
                //or in .babelrc
            }
        ]
    }
}