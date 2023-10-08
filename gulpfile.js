const gulp = require('gulp');

gulp.task("hello",function(callback){
console.log("Hello, from Gulp!");
setTimeout(sayHi, 1000);
setTimeout(sayHi, 5000);
callback();
}
);
function sayHi() {
  console.log('Привет');
}
