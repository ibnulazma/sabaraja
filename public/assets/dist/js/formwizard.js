document.addEventListener("DOMContentLoaded", function () {

    /* =============================
       VALIDASI GLOBAL (REALTIME)
    ============================= */
    document.addEventListener("input", function (e) {

        cekValidasi(1, "wajib-step1");
        cekValidasi(2, "wajib-step2");
        cekValidasi(3, "wajib-step3");
        cekValidasi(4, "wajib-step4");
        cekValidasi(5, "wajib-step5");

        // realtime validasi HP
        if (e.target && e.target.classList && e.target.classList.contains("hp-field")) {
            if (!e.target.disabled) {
                const err = document.getElementById("err_" + e.target.id);
                validasiNoHp(e.target, err);
            }
        }
    });

    function cekValidasi(step, className) {
        const inputs = document.querySelectorAll("." + className);
        const nextBtn = document.querySelector(`#step-${step} .next-btn`);
        const simpanBtn = document.getElementById("btnSimpan");

        let valid = true;

        inputs.forEach(input => {

            // skip input disabled
            if (input.disabled) return;

            // 🔥 skip input dari step lain
            if (input.closest(".step")?.classList.contains("d-none")) return;

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

        if (nextBtn) nextBtn.disabled = !valid;
        if (step === 4 && simpanBtn) simpanBtn.disabled = !valid;
    }

    /* =============================
       PINDAH STEP
    ============================= */
    document.querySelectorAll(".next-btn").forEach(btn => {
        btn.addEventListener("click", () => pindahStep(btn.dataset.next));
    });

    document.querySelectorAll(".prev-btn").forEach(btn => {
        btn.addEventListener("click", () => pindahStep(btn.dataset.prev));
    });

    function pindahStep(no) {
        document.querySelectorAll(".step").forEach(s => s.classList.add("d-none"));
        document.getElementById("step-" + no)?.classList.remove("d-none");

        // 🔥 paksa validasi ulang saat masuk step
        document.dispatchEvent(new Event("input"));
    }

    /* =============================
       FIELD NUMERIK
    ============================= */
    setNumeric(".nik-field", 16);
    setNumeric(".tahun-field", 4);
    setNumeric(".rt-rw-field", 2);

    function setNumeric(selector, max) {
        document.querySelectorAll(selector).forEach(input => {
            input.addEventListener("input", function () {
                this.value = this.value.replace(/\D/g, "").slice(0, max);
                toggleValid(this, this.value.length === max || max === 2);
            });
        });
    }

    /* =============================
       TOGGLE VALID / INVALID
    ============================= */
    function toggleValid(input, valid) {
        const err = document.getElementById("err_" + input.id);
        input.classList.toggle("is-valid", valid);
        input.classList.toggle("is-invalid", !valid);
        if (err) err.classList.toggle("d-none", valid);
    }

    /* =============================
       AYAH & IBU (SATU HANDLER)
    ============================= */
    document.addEventListener("change", function (e) {
        if (e.target.id === "kerja_ayah") handleOrangTua("ayah", e.target.value);
        if (e.target.id === "kerja_ibu") handleOrangTua("ibu", e.target.value);
    });

    function handleOrangTua(role, kerja) {
        const hasil = document.getElementById(`hasil_${role}`);
        const noHp = document.getElementById(`no_hp_${role}`);
        const errHp = document.getElementById(`err_no_hp_${role}`);

        if (!hasil || !noHp) return;

        /* === Penghasilan === */
        hasil.disabled = false;
        hasil.value = "";

        if (kerja === "Tidak Bekerja" || kerja === "Sudah Meninggal") {
            hasil.value = "Tidak Berpenghasilan";
            hasil.disabled = true;
        }

        /* === No HP === */
        if (kerja === "Sudah Meninggal") {
            noHp.value = "";
            noHp.disabled = true;
            noHp.classList.remove("is-valid", "is-invalid");
            errHp?.classList.add("d-none");
        } else {
            noHp.disabled = false;
            validasiNoHp(noHp, errHp);
        }

        // refresh validasi step aktif
        document.dispatchEvent(new Event("input"));
    }

    /* =============================
       VALIDASI NO HP (FINAL)
    ============================= */
    function validasiNoHp(input, err) {
        let val = input.value;

        // larang + - spasi huruf
        if (/[\+\-\sA-Za-z]/.test(val)) {
            input.classList.add("is-invalid");
            err?.classList.remove("d-none");
            return false;
        }

        val = val.replace(/\D/g, "");

        if (val.startsWith("0")) val = "62" + val.slice(1);
        else if (val.startsWith("8")) val = "62" + val;

        input.value = val;

        const valid = val.startsWith("62") && val.length >= 11 && val.length <= 14;
        input.classList.toggle("is-valid", valid);
        input.classList.toggle("is-invalid", !valid);
        err?.classList.toggle("d-none", valid);

        return valid;
    }

});
