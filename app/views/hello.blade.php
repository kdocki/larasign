<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Presenters example</title>
</head>
<body>
	<div class="welcome">

		<div>
			These output the same stuff... it's just that the first one is cleaner and uses a presenter
			to abstract away conditional statement found in the second section below.
		</div>

		<!-- using presenter added functionality -->
		<div>
			<span {{ $user->favoriteColorStyle }}>Hello there!</span> &lt;-- presenter
		</div>


		<!-- the presenter method replaces the following condition -->
		<div>
			@if ($user->favoriteColor)
				<span style="background-color: {{ $user->favoriteColor }}">Hello there!</span>
			@else
				<span>Hello there!</span>
			@endif
			&lt;-- no presenter
		</div>


	</div>
</body>
</html>
