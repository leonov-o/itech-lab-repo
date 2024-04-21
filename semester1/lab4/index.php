<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Голосування</title>
</head>
<body>

<h2>Ваша улюблена мова програмування?</h2>

<form action="vote.php" method="post">
    <div>
        <label for="option1">C++</label>
        <input type="radio" name="vote" id="option1" value="C++" required>
    </div
    >
    <div>
        <label for="option2">PHP</label>
        <input type="radio" name="vote" id="option2" value="PHP" required>
    </div>

    <div>
        <label for="option3">Java</label>
        <input type="radio" name="vote" id="option3" value="Java" required>
    </div>

    <button type="submit">Vote!</button>
</form>

</body>
</html>