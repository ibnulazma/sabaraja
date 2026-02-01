document.addEventListener("DOMContentLoaded", function () {

    // =============================
    // VALIDASI UMUM PER STEP
    // =============================
    document.addEventListener("input", function () {
        cekValidasi(1, "wajib-step1");
        cekValidasi(2, "wajib-step2");
        cekValidasi(3, "wajib-step3");
        cekValidasi(4, "wajib-step4");
    });

    function cekValidasi(step, className) {
        let inputs = document.querySelectorAll("." + className);
        let tombolNext = document.querySelector("#step-" + step + " .next-btn");
        let tombolSimpan = document.getElementById("btnSimpan");

        let valid = true;

        inputs.forEach(input => {
            if (input.value.trim() === "") valid = false;

            if (input.classList.contains("nik-field") && input.value.length !== 16)
                valid = false;

            if (input.classList.contains("hp-field")) {
                if (!(input.value.startsWith("62") && input.value.length >= 11))
                    valid = false;
            }

            if (input.classList.contains("tahun-field") && input.value.length !== 4)
                valid = false;
        });

        if (tombolNext) tombolNext.disabled = !valid;
        if (step === 4 && tombolSimpan) tombolSimpan.disabled = !valid;
    }
    // ===VALIDASI RT RW
    document.querySelectorAll(".rt-rw-field").forEach(input => {
        input.addEventListener("input", function () {
            // Hanya angka, max 2 digit
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);

            let valid = this.value.length >= 1 && this.value.length <= 2;
            toggleValid(this, valid);

            cekValidasi(1, "wajib-step1");
        });
    });
    // =============================
    // PINDAH STEP
    // =============================
    document.querySelectorAll(".next-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            let next = this.dataset.next;
            document.querySelectorAll(".step").forEach(s => s.classList.add("d-none"));
            document.getElementById("step-" + next).classList.remove("d-none");
        });
    });

    document.querySelectorAll(".prev-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            let prev = this.dataset.prev;
            document.querySelectorAll(".step").forEach(s => s.classList.add("d-none"));
            document.getElementById("step-" + prev).classList.remove("d-none");
        });
    });

    // =============================
    // VALIDASI NIK (16 DIGIT)
    // =============================
    document.querySelectorAll(".nik-field").forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
            toggleValid(this, this.value.length === 16);
            cekValidasi(2, "wajib-step2");
        });
    });
    // ========TAHUN LAHIR

    // =============================
    // FORMAT NO HP → 62
    // =============================
    document.querySelectorAll(".hp-field").forEach(input => {
        input.addEventListener("input", function () {
            let val = this.value.replace(/[^0-9+]/g, '');

            if (val.startsWith("+62")) val = "62" + val.slice(3);
            else if (val.startsWith("0")) val = "62" + val.slice(1);

            this.value = val;

            let valid = val.startsWith("62") && val.length >= 11 && val.length <= 14;
            toggleValid(this, valid);
            cekValidasi(2, "wajib-step2");
        });
    });

    // =============================
    // VALIDASI TAHUN LAHIR (4 DIGIT)
    // =============================
    document.querySelectorAll(".tahun-field").forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
            toggleValid(this, this.value.length === 4);
            cekValidasi(2, "wajib-step2");
        });
    });

    // =============================
    // HELPER VALID / INVALID UI
    // =============================
    function toggleValid(input, valid) {
        let err = document.getElementById("err_" + input.id);
        if (valid) {
            input.classList.remove("is-invalid");
            input.classList.add("is-valid");
            if (err) err.classList.add("d-none");
        } else {
            input.classList.remove("is-valid");
            input.classList.add("is-invalid");
            if (err) err.classList.remove("d-none");
        }
    }

    // =======SINKRONISASI KERJA SAMA PENGHASILAN AYAH

    document.addEventListener("DOMContentLoaded", function () {
        const kerjaAyah = document.getElementById("kerja_ayah");
        const hasilAyah = document.getElementById("hasil_ayah");

        kerjaAyah.addEventListener("change", function () {
            const val = this.value.toLowerCase();

            if (val.includes("tidak")) {
                hasilAyah.value = "Tidak Berpenghasilan";
                hasilAyah.disabled = true;
            }
            else if (val.includes("meninggal")) {
                hasilAyah.value = "Sudah Meninggal";
                hasilAyah.disabled = true;
            }
            else {
                hasilAyah.disabled = false;
                hasilAyah.value = "";
            }

            cekValidasi(2, "wajib-step2");
        });
    });









});
