<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Autentikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('login/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="">
    <div class="position-fixed bottom-0 end-0 m-3 bg-white p-3 rounded shadow" style="z-index: 999;">
        <label for="bgColorPicker" class="form-label mb-2">Pilih Warna Background:</label>
        <input type="color" id="bgColorPicker" class="form-control form-control-color mb-2" value="#6a11cb"
            title="Pilih warna">

        <div class="d-flex gap-2">
            <button class="btn btn-sm" style="background-color: #ffffff;" data-color="#ffffff"></button>
            <button class="btn btn-sm" style="background-color: #000000;" data-color="#000000"></button>
            <button class="btn btn-sm" style="background-color: #6a11cb;" data-color="#6a11cb"></button>
            <button class="btn btn-sm" style="background-color: #00b894;" data-color="#00b894"></button>
            <button class="btn btn-sm" style="background-color: #0984e3;" data-color="#0984e3"></button>
            <button class="btn btn-sm" style="background-color: #fd79a8;" data-color="#fd79a8"></button>
            <button class="btn btn-sm" style="background-color: #f39c12;" data-color="#f39c12"></button>
        </div>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('login/script.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bgColorPicker = document.getElementById("bgColorPicker");
            const presetButtons = document.querySelectorAll("button[data-color]");

            function setBackground(color) {
                document.body.style.setProperty('background-color', color, 'important');
                localStorage.setItem("bgColor", color);
                if (bgColorPicker) bgColorPicker.value = color;

                presetButtons.forEach(button => {
                    if (button.getAttribute("data-color").toLowerCase() === color.toLowerCase()) {
                        button.classList.add("active");
                    } else {
                        button.classList.remove("active");
                    }
                });

                document.body.className = "";
                document.body.classList.add(`bg-${color.replace('#', '')}`);
            }

            const savedColor = localStorage.getItem("bgColor");
            if (savedColor) {
                setBackground(savedColor);
            }

            if (bgColorPicker) {
                bgColorPicker.addEventListener("input", function() {
                    setBackground(this.value);
                });
            }

            presetButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const color = this.getAttribute("data-color");
                    setBackground(color);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });

        document.addEventListener("keydown", function(e) {
            if (e.keyCode === 123) {
                e.preventDefault();
            }
            if (e.ctrlKey && e.shiftKey && ["I", "J", "C"].includes(e.key.toUpperCase())) {
                e.preventDefault();
            }
            if (e.ctrlKey && e.key.toUpperCase() === "U") {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
