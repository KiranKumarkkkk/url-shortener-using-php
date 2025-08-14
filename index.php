<?php
// Simple URL shortener backend
$shortLinks = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['long_url'])) {
    $longUrl = trim($_POST['long_url']);
    $shortCode = substr(md5($longUrl . time()), 0, 6);
    $shortLinks[$shortCode] = $longUrl;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>🚀 URL Shortener</h1>
    </header>

    <main>
        <section class="shortener-card">
            <h2>Paste your long URL below</h2>
            <form method="POST">
                <input type="url" name="long_url" placeholder="https://example.com" required>
                <button type="submit">Shorten</button>
            </form>
        </section>

        <?php if (!empty($shortLinks)): ?>
        <section class="links-list">
            <h3>Shortened Links</h3>
            <table>
                <tr>
                    <th>Short URL</th>
                    <th>Original URL</th>
                </tr>
                <?php foreach ($shortLinks as $code => $url): ?>
                <tr>
                    <td><a href="<?= htmlspecialchars($url) ?>" target="_blank">http://localhost/<?= $code ?></a></td>
                    <td><?= htmlspecialchars($url) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
        <?php endif; ?>
    </main>
</body>
</html>
