/**
 * Jeam As Brochure Generator — JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {

    // ─── PRIMARY COLOUR preview ─────────────────
    var primaryInput  = document.getElementById('primary_color');
    var primarySwatch = document.getElementById('primary-swatch');

    if (primaryInput && primarySwatch) {
        primaryInput.addEventListener('input', function () {
            primarySwatch.style.backgroundColor = this.value;
        });
    }

    // ─── SECONDARY COLOUR preview ───────────────
    var secondaryInput  = document.getElementById('secondary_color');
    var secondarySwatch = document.getElementById('secondary-swatch');

    if (secondaryInput && secondarySwatch) {
        secondaryInput.addEventListener('input', function () {
            secondarySwatch.style.backgroundColor = this.value;
        });
    }

    // ─── LOGO PREVIEW ───────────────────────────
    var logoInput       = document.getElementById('logo');
    var logoPreview     = document.getElementById('logo-preview');
    var logoPreviewWrap = document.getElementById('logo-preview-wrap');

    if (logoInput && logoPreview) {
        logoInput.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                logoPreview.src = e.target.result;
                logoPreviewWrap.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    }

    // ─── TAGLINE CHARACTER COUNTER ──────────────
    var taglineInput   = document.getElementById('tagline');
    var taglineCounter = document.getElementById('tagline-counter');

    if (taglineInput && taglineCounter) {
        taglineInput.addEventListener('input', function () {
            var count = this.value.length;
            taglineCounter.textContent = count + ' / 100 characters';
            taglineCounter.style.color = count >= 90 ? '#e53e3e' : '#999999';
        });
    }

    // ─── FORM VALIDATION ────────────────────────
    var form      = document.getElementById('brochure-form');
    var nameInput = document.getElementById('full_name');

    if (form && nameInput) {
        form.addEventListener('submit', function (e) {
            if (nameInput.value.trim() === '') {
                e.preventDefault();
                nameInput.focus();
                nameInput.style.borderColor = '#e53e3e';
                alert('Please enter your full name before generating the brochure.');
            } else {
                nameInput.style.borderColor = '';
            }
        });
    }

});
