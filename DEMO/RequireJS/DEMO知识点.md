## 学习心得，这个很重要
### 1. requirejs配置中，baseUrl有什么作用？以什么做为基础？paths的作用和用法是什么？
 
```
requirejs.config({
	baseUrl:'src/js',
	paths:{
		'jquery':'lib/bower_components/jquery/dist/jquery.min'
	}
});
```
+ baseUrl的作用是：设定依赖模块的路径，后续加载依赖模块时就按照`baseUrl`设定的路径为基础去寻找目标模块，减少了define或者require时候，依赖模块路径的书写量；
+ baseUrl的基础：如果不显式的设置data-main或者paths，那么`baseUrl`就是引用`require.js`的html(以下称index.html)所在的路径；
+ `baseUrl:"src/js"`: 就是把加载依赖模块的路径设置为`index.html`所在目录中一个叫`src`文件夹下，一个叫`js`的文件夹；

----
+ paths的作用：在`baseUrl`的基础上，为个别模块进行再次路径配置，利用paths就可以指定每特定模块的加载路径；
+ paths的用法：如果模块们都在一起，一个`baseUrl`就能搞定，但是这里`jquery`在更加深的目录，paths就为了他这个特例去配置，以免在定义模块时，为了依赖`jquery`写一长串基于`baseUrl`的路径；这里利用`paths`修改加载路径，在define模块的时候，只需要写一个`jquery`就代表了`lib/bower_components/jquery/dist/jquery.min`；相当于是基于`baseUrl`的映射；


### 2.r.js 的打包配置中 baseUrl 是什么? name 是什么?
```
({
    baseUrl: "./src/js",
    paths: {
        'jquery': 'lib/bower_components/jquery/dist/jquery.min'
    },
    name: "main",
    out: "dist/js/merge.js"
})
```
+ 首先r.js是一个压缩工具，本身并不需要引入界面，是把各种模块以及`main.js`合并成一个js文件，正如同`require.js`需要一个入口配置`main.js`来设置每个模块的信息一样，r.js也需要一个打包配置（下称build.js），并且`bulid.js`中也需要写`baseUrl`和`name`；
+ r.js的打包配置中baseUrl：与`main.js`中的`baseUrl`不同的是，`bulid.js`的`baseUrl`是基于自身所在的目录，通过一系列的跳转动作最终找到`main.js`中`baseUrl`所设置的目录，这个一系列动作就是其值；
+ r.js的name:经过上面的baseUrl之后，找到了`main.js`所在的目录，然后name就是入口js的名称，这里就是`main`，然后再通过`main.js`里面的`baseUrl`去找待压缩的模块；
+ r.js的out:以什么样的名字和后缀，输出到哪个路径，基础是`build.js`所在的目录；
+ r.js的运行见下图：
+ 引入页面时候，在其前面需要引入`require.js`，模块和`main.js`就不需要再次引入了，因为压缩的`main.min.js`已经将`main.js`和模块们都给压缩进来了；
+ r.js的运行见下图：![0_1463914258844_启动r.js.jpg](http://7xpvnv.com2.z0.glb.qiniucdn.com/5d927b73-b975-4d71-a89c-0398c01a738e.jpg) 
### [实现效果，未使用`require.js`](http://4.tamamoran.applinzi.com/)
### [实现效果，已使用`require.js`，已使用`r.js`压缩](http://5.tamamoran.applinzi.com/index.html)


