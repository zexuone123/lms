@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-success mb-4 animate__animated animate__fadeInDown">✖️ Materi Perkalian SD</h2>
    <p class="text-muted">Mari belajar perkalian dengan cara yang mudah dan menyenangkan!</p>

    <!-- Pengertian -->
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="fw-bold text-primary">1. Apa itu Perkalian?</h4>
        <p>Perkalian adalah penjumlahan berulang. Misalnya, <b>2 × 3</b> artinya <b>2 + 2 + 2 = 6</b>. 
        Jadi, kita menjumlahkan angka yang sama beberapa kali sesuai dengan angka pengali.</p>
    </div>

    <!-- Perkalian dengan 0 dan 1 -->
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="fw-bold text-info">2. Perkalian dengan 0 dan 1</h4>
        <ul>
            <li>Semua bilangan dikalikan <b>0</b> hasilnya adalah <b>0</b>. Contoh: 5 × 0 = 0.</li>
            <li>Semua bilangan dikalikan <b>1</b> hasilnya adalah bilangan itu sendiri. Contoh: 7 × 1 = 7.</li>
        </ul>
    </div>

    <!-- Contoh Dasar -->
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="fw-bold text-success">3. Contoh Perkalian Dasar</h4>
        <ul>
            <li>2 × 1 = 2</li>
            <li>2 × 2 = 4</li>
            <li>2 × 3 = 6</li>
            <li>3 × 4 = 12</li>
            <li>5 × 5 = 25</li>
        </ul>
    </div>

    <!-- Tabel Perkalian -->
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="fw-bold text-primary">4. Tabel Perkalian 1–10</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th>x</th>
                        @for($i=1; $i<=10; $i++)
                            <th>{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @for($row=1; $row<=10; $row++)
                        <tr>
                            <th class="table-success">{{ $row }}</th>
                            @for($col=1; $col<=10; $col++)
                                <td>{{ $row * $col }}</td>
                            @endfor
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <!-- Soal Cerita -->
    <div class="card p-4 shadow-sm mb-4">
        <h4 class="fw-bold text-warning">5. Soal Cerita</h4>
        <p><b>Contoh:</b> Siti membeli 4 bungkus permen. Setiap bungkus berisi 5 permen. Berapa jumlah seluruh permen yang dimiliki Siti?</p>
        <p><i>Jawab:</i> 4 × 5 = 20, jadi total permen adalah 20 buah.</p>
    </div>
<!-- Quiz Interaktif -->
<div class="card p-4 shadow-lg border-success">
        <h4 class="fw-bold text-success mb-3">Quiz Perkalian</h4>
        <p>Pilih jawaban yang benar untuk setiap soal:</p>
        <div id="quiz-container"></div>

        <div class="mt-3 text-center">
            <button class="btn btn-outline-primary" onclick="generateQuiz()">🔄 Ulang Quiz</button>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/belajar-anak/matematika" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Pilihan Materi
        </a>
    </div>
</div>

<script>
function generateQuiz() {
    const quizContainer = document.getElementById("quiz-container");
    quizContainer.innerHTML = ""; // kosongkan quiz sebelumnya

    for (let i = 1; i <= 3; i++) {
        let num1 = Math.floor(Math.random() * 9) + 2; // 2-10
        let num2 = Math.floor(Math.random() * 9) + 2; // 2-10
        let correctAnswer = num1 * num2;

        // pilihan jawaban (acak)
        let answers = [correctAnswer];
        while (answers.length < 3) {
            let wrongAnswer = Math.floor(Math.random() * 81) + 4; // jawaban salah
            if (!answers.includes(wrongAnswer)) {
                answers.push(wrongAnswer);
            }
        }
        answers.sort(() => Math.random() - 0.5); // acak urutan pilihan

        // render soal
        let questionHTML = `
            <div class="mb-3">
                <p class="fw-bold">${i}. ${num1} × ${num2} = ?</p>
                ${answers.map(a => `<button class="btn btn-outline-primary btn-sm me-2 mb-2" onclick="checkAnswer(this, ${correctAnswer})">${a}</button>`).join('')}
            </div>
        `;
        quizContainer.innerHTML += questionHTML;
    }
}

function checkAnswer(button, correct) {
    let userAnswer = parseInt(button.innerText);
    if(userAnswer === correct) {
        button.classList.remove("btn-outline-primary");
        button.classList.add("btn-success");
        button.innerHTML += " ✅";
    } else {
        button.classList.remove("btn-outline-primary");
        button.classList.add("btn-danger");
        button.innerHTML += " ❌";
    }
}

// jalankan quiz pertama kali saat halaman dibuka
generateQuiz();
</script>
@endsection
