
# Laravel Advacned

## Elixir - gulp wrapper

**What Elixir can do?**

1. Include package from `app.js`

```javascript
	require('your-package-name')
```

2. Include package from `app.scss`

```css
	@import('node_modules/package-name/');
```

3. Concatenation via `gulpfile.js`

```javascript
	elixir(function(mix) {
	    mix.styles([
	        'normalize.css',
	        'main.css'
	    ]);
	});
```

2. Method Chaining

```javascript
	elixir(function(mix) {
	    mix.styles([
	        	'animate.min.css'
	    	],
	    	'public/css/animation.css',
	    	'node_modules/animate.css'
	    ).scripts([
	        	'wow.min.js'
	    	],
	    	'public/js/animation.js',
	    	'node_modules/wow.js/dist'
	    );
	});
```