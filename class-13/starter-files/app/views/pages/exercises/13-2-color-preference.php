<?php
// Exercise 13-2: implement the color preference functionality.

$allowedColors = ["white", "lightblue", "lightgreen", "lightcoral"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// TODO: implement the logic to save the user's color preference using cookies.
}

$bgcolor = $_COOKIE["bgcolor"] ?? "white";
if (!in_array($bgcolor, $allowedColors, true)) {
		$bgcolor = "white";
}
?>

<div class="container mt-5" style="max-width: 560px;">
	<h2 class="mb-4">Select Your Preferred Background Color</h2>

	<div class="card shadow-sm" style="background-color: <?php echo htmlspecialchars($bgcolor); ?>;">
		<div class="card-body">
			<form method="POST" action="/ex/13-2">
				<div class="mb-3">
					<label for="color" class="form-label">Choose a color</label>
					<select name="color" id="color" class="form-select" required>
						<option value="white" <?php echo $bgcolor === "white" ? "selected" : ""; ?>>White</option>
						<option value="lightblue" <?php echo $bgcolor === "lightblue" ? "selected" : ""; ?>>Light Blue</option>
						<option value="lightgreen" <?php echo $bgcolor === "lightgreen" ? "selected" : ""; ?>>Light Green</option>
						<option value="lightcoral" <?php echo $bgcolor === "lightcoral" ? "selected" : ""; ?>>Light Coral</option>
					</select>
				</div>

				<div class="d-flex gap-2">
					<button type="submit" class="btn btn-primary">Save Preference</button>
					<button type="submit" name="reset" value="1" class="btn btn-outline-secondary">Reset to Default</button>
				</div>
			</form>
		</div>
	</div>
</div>
