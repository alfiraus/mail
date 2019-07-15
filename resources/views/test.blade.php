<body style="position: relative;
  margin: 0;
  padding-bottom: 6rem;
  min-height: 100%;
  font-family: "Helvetica Neue", Arial, sans-serif;">
<div style="  margin: 0 auto;
  padding-top: 64px;
  max-width: 640px;
  width: 94%;">
  <h1>CSS “Always on the bottom” Footer</h1>

  <p>I often find myself designing a website where the footer must rest at the bottom of the page, even if the content above it is too short to push it to the bottom of the viewport naturally.</p>

  <p>However, if the content is taller than the user’s viewport, then the footer should disappear from view as it would normally, resting at the bottom of the page (not fixed to the viewport).</p>

  <p>If you know the height of the footer, then you should set it explicitly, and set the bottom padding of the footer’s parent element to be the same value (or larger if you want some spacing).</p>

  <p>This is to prevent the footer from overlapping the content above it, since it is being removed from the document flow with <code>position: absolute;</code>.</p>
</div>

<div style="  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;">This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>.</div>