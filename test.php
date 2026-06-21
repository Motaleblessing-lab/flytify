<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motale Blessing — Build Your Brochure</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="header">
        <div class="container">
            <div class="logo">Motale Blessing</div>
            <div class="nav">
                <a href="index.php">Home</a>
                <a href="test.php">Create Yours</a>
            </div>
        </div>
    </div>

    <div class="builder">
        <div class="container">
            <h1>Create Your Brochure</h1>
            <p class="page-sub">Select a template and fill in your details to generate a personalised brochure.</p>

            <form action="generate.php" method="POST" enctype="multipart/form-data" id="brochure-form">

                <div class="form-section">
                    <h2>Step 1: Choose a Template</h2>

                    <?php $selectedModel = htmlspecialchars($_GET['model'] ?? 'model1'); ?>

                    <label class="model-option">
                        <input type="radio" name="model" value="model1" <?php echo $selectedModel === 'model1' ? 'checked' : ''; ?>>
                        <img src="assets/images/preview-model1.svg" alt="Classic template preview" class="model-preview-img">
                        <span class="model-label">Model 1 — Classic</span>
                    </label>

                    <label class="model-option">
                        <input type="radio" name="model" value="model2" <?php echo $selectedModel === 'model2' ? 'checked' : ''; ?>>
                        <img src="assets/images/preview-model2.svg" alt="Modern template preview" class="model-preview-img">
                        <span class="model-label">Model 2 — Modern</span>
                    </label>
                </div>

                <div class="form-section">
                    <h2>Step 2: Your Information</h2>

                    <div class="field">
                        <label for="full_name">Full Name *</label>
                        <input type="text" id="full_name" name="full_name" placeholder="e.g. Jane Doe" required>
                    </div>

                    <div class="field">
                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" placeholder="e.g. Motale Blessing Ltd">
                    </div>

                    <div class="field">
                        <label for="tagline">Tagline / Slogan</label>
                        <input type="text" id="tagline" name="tagline" placeholder="e.g. Building the future" maxlength="100">
                        <p class="hint" id="tagline-counter">0 / 100 characters</p>
                    </div>

                    <div class="row">
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="jane@example.com">
                        </div>
                        <div class="field">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="+1 234 567 890">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Step 3: Choose Your Colours</h2>

                    <div class="row">
                        <div class="field">
                            <label for="primary_color">Primary Colour</label>
                            <input type="color" id="primary_color" name="primary_color" value="#1a4731">
                            <div class="swatch" id="primary-swatch" style="background:#1a4731;"></div>
                        </div>
                        <div class="field">
                            <label for="secondary_color">Secondary Colour</label>
                            <input type="color" id="secondary_color" name="secondary_color" value="#7c4a1e">
                            <div class="swatch" id="secondary-swatch" style="background:#7c4a1e;"></div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Step 4: Upload Your Logo</h2>
                    <div class="field">
                        <label for="logo">Logo Image</label>
                        <input type="file" id="logo" name="logo" accept="image/png, image/jpeg">
                        <p class="hint">Accepted: PNG, JPG. Max 2MB.</p>
                        <div id="logo-preview-wrap" style="display:none; margin-top:10px;">
                            <img id="logo-preview" src="" alt="Logo preview" style="max-height:80px; border-radius:4px; border:1px solid #ddd; padding:4px;">
                        </div>
                    </div>
                </div>

                <div class="form-section action-row">
                    <button type="submit" class="btn">Generate My Brochure</button>
                </div>

            </form>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Motale Blessing. All rights reserved.</p>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
