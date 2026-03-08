<!DOCTYPE html>
<html>
<head>
    <title>FAQ / Health Tips - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>body{background-color:#e8f4f8;}</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="chat.php"><i class="bi bi-heart-pulse-fill"></i> MediAssist AI</a>
  </div>
</nav>

<div class="container">
    <h2 class="mb-4 text-center">FAQ & Health Tips</h2>
    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    How to prevent dehydration?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Give plenty of water or ORS. Encourage small frequent sips. Avoid excessive sun exposure.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                    What to do for fever at home?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Rest, give fluids, use paracetamol if safe. Monitor for danger signs like breathing difficulty, confusion, or persistent high fever.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                    How to act in case of chest pain?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Call emergency services immediately. Keep the patient calm and seated. Do not give food or water until evaluated.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                    How to manage vomiting and diarrhea?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Give ORS in small frequent amounts. Encourage rest. Monitor for dehydration and severe weakness. Refer if unable to retain fluids.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                    How to identify serious infection?
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Look for high fever, confusion, difficulty breathing, persistent vomiting, or rapid heartbeat. Immediate referral to hospital is needed.</div>
            </div>
        </div>

        <!-- NEW ADDITIONAL QUESTIONS -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                    How to safely give medicine at home?
                </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Always follow dosage instructions. Use clean spoons or cups. Monitor patient for reactions. Keep medicines out of reach of children.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq7">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
                    When to refer patient to hospital?
                </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Refer immediately if patient has breathing difficulty, chest pain, severe bleeding, confusion, persistent vomiting, or high fever not responding to care.</div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq8">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8">
                    How to prevent spread of infections?
                </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Wash hands frequently, use masks when sick, keep patients isolated if contagious, disinfect surfaces, and encourage vaccination if available.</div>
            </div>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="chat.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Home</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>