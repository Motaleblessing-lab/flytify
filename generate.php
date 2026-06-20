<?php
// Redirect if accessed directly without POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: test.php');
    exit;
}

// ─── Read form data ───────────────────────────────────────────
$fullName       = htmlspecialchars(trim($_POST['full_name']       ?? ''));
$companyName    = htmlspecialchars(trim($_POST['company_name']    ?? ''));
$tagline        = htmlspecialchars(trim($_POST['tagline']         ?? ''));
$email          = htmlspecialchars(trim($_POST['email']           ?? ''));
$phone          = htmlspecialchars(trim($_POST['phone']           ?? ''));
$model          = in_array($_POST['model'] ?? '', ['model1', 'model2']) ? $_POST['model'] : 'model1';
$primaryColor   = preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST['primary_color']   ?? '') ? $_POST['primary_color']   : '#3B82F6';
$secondaryColor = preg_match('/^#[0-9A-Fa-f]{6}$/', $_POST['secondary_color'] ?? '') ? $_POST['secondary_color'] : '#1E3A5F';

// Basic validation
if ($fullName === '') {
    header('Location: test.php?error=name_required');
    exit;
}

// ─── Handle logo upload ───────────────────────────────────────
$logoPath = 'assets/images/placeholder-logo.png';

if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/png', 'image/jpeg'];
    $fileType = mime_content_type($_FILES['logo']['tmp_name']);

    if (in_array($fileType, $allowedTypes) && $_FILES['logo']['size'] <= 2 * 1024 * 1024) {
        $ext      = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        $filename = 'logo_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $dest     = 'uploads/' . $filename;

        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $dest)) {
            $logoPath = $dest;
        }
    }
}

// ─── Connect to database (optional — skipped if env not set) ──
$dbSaved = false;
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbName = getenv('DB_NAME') ?: '';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';

if ($dbName !== '') {
    try {
        $pdo = new PDO(
            "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",
            $dbUser,
            $dbPass
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO submissions
                    (full_name, company_name, tagline, email, phone, model, primary_color, secondary_color, custom_image_path)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $fullName, $companyName, $tagline, $email, $phone,
            $model, $primaryColor, $secondaryColor, $logoPath
        ]);
        $dbSaved = true;
    } catch (PDOException $e) {
        // DB save failed — still render brochure
    }
}

// ─── Load and render template ─────────────────────────────────
$templateFile = 'models/' . $model . '.html';

if (!file_exists($templateFile)) {
    die('Template not found.');
}

$template = file_get_contents($templateFile);

$replacements = [
    '{{FULL_NAME}}'       => $fullName,
    '{{COMPANY_NAME}}'    => $companyName ?: $fullName,
    '{{TAGLINE}}'         => $tagline,
    '{{EMAIL}}'           => $email,
    '{{PHONE}}'           => $phone,
    '{{PRIMARY_COLOR}}'   => $primaryColor,
    '{{SECONDARY_COLOR}}' => $secondaryColor,
    '{{LOGO_PATH}}'       => $logoPath,
    '{{YEAR}}'            => date('Y'),
];

$output = str_replace(
    array_keys($replacements),
    array_values($replacements),
    $template
);

echo $output;
