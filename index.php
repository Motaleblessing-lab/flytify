<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeam As — Brochure Generator</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="header">
        <div class="container">
            <div class="logo">Jeam As</div>
            <div class="nav">
                <a href="index.php">Home</a>
                <a href="#templates">Templates</a>
                <a href="#how">How It Works</a>
                <a href="test.php" class="btn-small">Create Yours</a>
            </div>
        </div>
    </div>

    <div class="hero">
        <div class="container">
            <h1>Create a Beautiful Brochure in Minutes</h1>
            <p class="hero-sub">Pick a template, add your company details and logo, and get a print-ready brochure instantly — no design skills needed.</p>
            <a href="test.php" class="btn">Create Your Brochure</a>
        </div>
    </div>

    <div id="how" class="section">
        <div class="container">
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-num">1</div>
                    <h3>Pick a Template</h3>
                    <p>Choose from our professionally designed brochure layouts.</p>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <h3>Add Your Info</h3>
                    <p>Fill in your company name, brand colours, and upload your logo.</p>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <h3>Get Your Brochure</h3>
                    <p>Receive a personalised, print-ready brochure in seconds.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="templates" class="section grey">
        <div class="container">
            <h2>Choose a Template</h2>
            <div class="template-grid">
                <div class="template-card">
                    <div class="template-box box-1">Classic</div>
                    <h3>Model 1 — Classic</h3>
                    <p>A clean, professional layout with a bold header and structured content blocks.</p>
                    <a href="test.php?model=model1" class="btn-small">Use This</a>
                </div>
                <div class="template-card">
                    <div class="template-box box-2">Modern</div>
                    <h3>Model 2 — Modern</h3>
                    <p>A bold two-column design with a coloured sidebar and elegant typography.</p>
                    <a href="test.php?model=model2" class="btn-small">Use This</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Jeam As. All rights reserved.</p>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
