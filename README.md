# fetch for Craft CMS

Fetches a simple JSON feed containing an object called 'entry'. It was built to pull a blog post from one site to display it on another. Here's a sample JSON template:

```
{% spaceless %}
	{% set entry = craft.entries.section('blog').first %}
{% endspaceless %}
{
	"entry": {
		"id": "{{ entry.id }}",
		"url": "{{ entry.url }}",
		"title": "{{ entry.title | raw }}",
		"date": "{{ entry.postDate.format('j M Y') }}",
		"summary": "{{ entry.summary }}",
		"image": "{% set image = entry.image.first %}{% set lowRes = { mode: 'fit', width: 900 } %}{{ image.getUrl(lowRes) }}"
	}
}
```
And it's pulled through to the HTML template like so:
```
{% set entry = craft.fetch.fetchEntry() %}
<article>
	<header class="matchheight">
		<h2><a href="{{ entry.url }}">{{ entry.title }}</a></h2>
		<time>{{ entry.date }}</time>
		<p>{{ entry.summary }}</p>
	</header>
	<a href="{{ entry.url }}">
		<img src="{{ entry.image }}" alt="">
	</a>
</article>
