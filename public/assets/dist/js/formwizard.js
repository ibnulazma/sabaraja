// document.addEventListener("DOMContentLoaded", function () {

//     const TOTAL_STEP = 5;
//     const KEY_STEP = "wizard_step";

//     /* =============================
//        RESTORE STEP
//     ============================= */
//     const lastStep = parseInt(sessionStorage.getItem(KEY_STEP)) || 1;
//     pindahStep(lastStep);

//     /* =============================
//        VALIDASI REALTIME GLOBAL
//     ============================= */
//     document.addEventListener("input", function (e) {

//         const target = e.target;

        

//         if (!(target instanceof HTMLInputElement) &&
//             !(target instanceof HTMLSelectElement) &&
//             !(target instanceof HTMLTextAreaElement)) {
//             return;
//         }

//         // NIK
//         if (target.classList.contains("nik-field") && !target.disabled) {
//             const err = document.getElementById("err_" + target.id);
//             validasiNIK(target, err);
//         }

//         // NO HP
//         if (target.classList.contains("hp-field") && !target.disabled) {
//             const err = document.getElementById("err_" + target.id);
//             validasiNoHp(target, err);
//         }

//         // Tahun
//         if (target.classList.contains("tahun-field") && !target.disabled) {
//             validasiTahun(target);
//         }

//         // Cek semua step
//         for (let i = 1; i <= TOTAL_STEP; i++) {
//             cekValidasi(i, "wajib-step" + i);
//         }
//     });

//     /* =============================
//        CEK VALIDASI PER STEP
//     ============================= */
//     function cekValidasi(step, className) {

//         const inputs = document.querySelectorAll("." + className);
//         const nextBtn = document.querySelector(`#step-${step} .next-btn`);
//         const simpanBtn = document.getElementById("btnSimpan");

//         let valid = true;

//         inputs.forEach(input => {

//             if (input.disabled) return;
//             if (input.closest(".step")?.classList.contains("d-none")) return;

//             const val = input.value.trim();

//             if (val === "") valid = false;

//             if (input.classList.contains("nik-field")) {
//                 const err = document.getElementById("err_" + input.id);
//                 if (!validasiNIK(input, err)) valid = false;
//             }

//             if (input.classList.contains("hp-field")) {
//                 const err = document.getElementById("err_" + input.id);
//                 if (!validasiNoHp(input, err)) valid = false;
//             }

//             if (input.classList.contains("tahun-field")) {
//                 const err = document.getElementById("err_" + input.id);
//                 if (!validasiTahun(input, err)) valid = false;
//             }
//             if (input.classList.contains("rt-rw-field")) {
//                 const err = document.getElementById("err_" + input.id);
//                 if (!validasiRTRW(input, err)) valid = false;
//             }
//         });

//         if (nextBtn) nextBtn.disabled = !valid;
//         if (step === 4 && simpanBtn) simpanBtn.disabled = !valid;
//     }

//     /* =============================
//        PINDAH STEP
//     ============================= */
//     document.querySelectorAll(".next-btn").forEach(btn => {
//         btn.addEventListener("click", function () {

//             const currentStep = this.dataset.current;
//             const nextStep = this.dataset.next;

//             simpanStep(currentStep, function (success) {
//                 if (success) {
//                     pindahStep(nextStep);
//                 } else {
//                     alert("Gagal menyimpan data.");
//                 }
//             });

//         });
//     });


    

//     document.querySelectorAll(".prev-btn").forEach(btn => {
//         btn.addEventListener("click", () => pindahStep(btn.dataset.prev));
//     });

//     function pindahStep(step) {

//         step = parseInt(step);

//         document.querySelectorAll(".step").forEach(s => s.classList.add("d-none"));
//         document.getElementById("step-" + step)?.classList.remove("d-none");

//         sessionStorage.setItem(KEY_STEP, step);
//         updateProgress(step);

//         document.dispatchEvent(new Event("input"));
//     }

//     /* =============================
//        PROGRESS BAR
//     ============================= */
//     function updateProgress(step) {
//         const bar = document.getElementById("progressBar");
//         if (!bar) return;

//         const percent = Math.round((step / TOTAL_STEP) * 100);
//         bar.style.width = percent + "%";
//         bar.innerText = `Step ${step} dari ${TOTAL_STEP}`;
//     }

//     /* =============================
//        NUMERIC AUTO FILTER
//     ============================= */
//     setNumeric(".nik-field", 16);
//     setNumeric(".tahun-field", 4);
//     setNumeric(".rt-rw-field", 2);

//     function setNumeric(selector, max) {
//         document.querySelectorAll(selector).forEach(input => {
//             input.addEventListener("input", function () {
//                 this.value = this.value.replace(/\D/g, "").slice(0, max);
//             });
//         });
//     }

//     /* =============================
//        VALIDASI NIK
//     ============================= */
//     function validasiNIK(input, err) {

//         const val = input.value.replace(/\D/g, "");

//         if (val.length === 0) {
//             input.classList.remove("is-valid", "is-invalid");
//             err?.classList.add("d-none");
//             return false;
//         }

//         if (val.length !== 16) {
//             input.classList.add("is-invalid");
//             input.classList.remove("is-valid");
//             err?.classList.remove("d-none");
//             return false;
//         }

//         input.classList.remove("is-invalid");
//         input.classList.add("is-valid");
//         err?.classList.add("d-none");

//         return true;
//     }

//     /* =============================
//        VALIDASI NO HP
//     ============================= */
//     function validasiNoHp(input, err) {

//         let val = input.value.replace(/\D/g, "");

//         if (val.startsWith("0")) val = "62" + val.slice(1);
//         else if (val.startsWith("8")) val = "62" + val;

//         input.value = val;

//         const valid = val.startsWith("62") && val.length >= 11 && val.length <= 14;

//         input.classList.toggle("is-valid", valid);
//         input.classList.toggle("is-invalid", !valid);
//         err?.classList.toggle("d-none", valid);

//         return valid;
//     }

//     /* =============================
//        VALIDASI TAHUN
//     ============================= */
//     function validasiTahun(input, err) {

//         const val = input.value.replace(/\D/g, "");

//         if (val.length === 0) {
//             input.classList.remove("is-valid", "is-invalid");
//             err?.classList.add("d-none");
//             return false;
//         }

//         if (val.length !== 4) {
//             input.classList.add("is-invalid");
//             input.classList.remove("is-valid");
//             err?.classList.remove("d-none");
//             return false;
//         }

//         input.classList.remove("is-invalid");
//         input.classList.add("is-valid");
//         err?.classList.add("d-none");

//         return true;
//     }
//     function validasiRTRW(input, err) {

//         const val = input.value.replace(/\D/g, "");

//         if (val.length === 0) {
//             input.classList.remove("is-valid", "is-invalid");
//             err?.classList.add("d-none");
//             return false;
//         }

//         if (val.length !== 2) {
//             input.classList.add("is-invalid");
//             input.classList.remove("is-valid");
//             err?.classList.remove("d-none");
//             return false;
//         }

//         input.classList.remove("is-invalid");
//         input.classList.add("is-valid");
//         err?.classList.add("d-none");

//         return true;
//     }













//     // CODING FORM SIMPAN STEP
//     function simpanStep(step, callback) {

//         const formData = new FormData();
//         const idSiswa = document.getElementById("id_siswa")?.value;

//         if (idSiswa) {
//             formData.append("id_siswa", idSiswa);
//         }

//         document.querySelectorAll(`#step-${step} input, #step-${step} select, #step-${step} textarea`)
//             .forEach(input => {
//                 if (!input.name) return;
//                 formData.append(input.name, input.value);
//             });

//         fetch("/siswa/simpan_step", {
//             method: "POST",
//             body: formData
//         })
//         .then(res => res.json())
//         .then(data => {

//             if (data.status === "success") {

//                 if (data.id_siswa) {
//                     document.getElementById("id_siswa").value = data.id_siswa;
//                 }

//                 callback(true);

//             } else {
//                 callback(false);
//             }

//         })
//         .catch(() => callback(false));
//     }


// });

// ====================Versi JADUL =====================








// =============VERSI FINAL=================

document.addEventListener("DOMContentLoaded", function () {

    const TOTAL_STEP = 4;
    const KEY_STEP = "wizard_step";

    /* =============================
       RESTORE STEP
    ============================= */
    const lastStep = parseInt(sessionStorage.getItem(KEY_STEP)) || 1;
    pindahStep(lastStep);

    /* =============================
       VALIDASI REALTIME GLOBAL
    ============================= */
   document.addEventListener("input", function (e) {

    const target = e.target;

    if (!(target instanceof HTMLInputElement) &&
        !(target instanceof HTMLSelectElement) &&
        !(target instanceof HTMLTextAreaElement)) {
        return;
    }

    if (target.disabled) return;

    // validasi khusus
    if (target.classList.contains("nik-field")) {
        validasiNIK(target, document.getElementById("err_" + target.id));
    }

    if (target.classList.contains("hp-field")) {
        validasiNoHp(target, document.getElementById("err_" + target.id));
    }

    if (target.classList.contains("tahun-field")) {
        validasiTahun(target, document.getElementById("err_" + target.id));
    }

    if (target.classList.contains("rt-rw-field")) {
        validasiRTRW(target, document.getElementById("err_" + target.id));
    }

    // 🔥 hanya cek step tempat input itu berada
    const stepElement = target.closest(".step");
    if (!stepElement) return;

    const stepNumber = stepElement.id.replace("step-", "");
    cekValidasi(stepNumber);
    });



    // ==============VALIDASI NIK
    function validasiNIK(input, err) {

        const val = input.value.replace(/\D/g, "");

        if (val.length === 0) {
            input.classList.remove("is-valid", "is-invalid");
            err?.classList.add("d-none");
            return false;
        }

        if (val.length !== 16) {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
            err?.classList.remove("d-none");
            return false;
        }

        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        err?.classList.add("d-none");

        return true;
    }

    /* =============================
       VALIDASI NO HP
    ============================= */
    function validasiNoHp(input, err) {

        let val = input.value.replace(/\D/g, "");

        if (val.startsWith("0")) val = "62" + val.slice(1);
        else if (val.startsWith("8")) val = "62" + val;

        input.value = val;

        const valid = val.startsWith("62") && val.length >= 11 && val.length <= 14;

        input.classList.toggle("is-valid", valid);
        input.classList.toggle("is-invalid", !valid);
        err?.classList.toggle("d-none", valid);

        return valid;
    }

    /* =============================
       VALIDASI TAHUN
    ============================= */
    function validasiTahun(input, err) {

        const val = input.value.replace(/\D/g, "");

        if (val.length === 0) {
            input.classList.remove("is-valid", "is-invalid");
            err?.classList.add("d-none");
            return false;
        }

        if (val.length !== 4) {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
            err?.classList.remove("d-none");
            return false;
        }

        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        err?.classList.add("d-none");

        return true;
    }
    function validasiRTRW(input, err) {

        const val = input.value.replace(/\D/g, "");

        if (val.length === 0) {
            input.classList.remove("is-valid", "is-invalid");
            err?.classList.add("d-none");
            return false;
        }

        if (val.length !== 2) {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
            err?.classList.remove("d-none");
            return false;
        }

        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        err?.classList.add("d-none");

        return true;
    }











    /* =============================
       CEK VALIDASI PER STEP
    ============================= */
    function cekValidasi(step) {

    const stepElement = document.getElementById("step-" + step);
    if (!stepElement) return;

    const inputs = stepElement.querySelectorAll(".wajib-step" + step);
    const nextBtn = stepElement.querySelector(".next-btn");

    let valid = true;

    inputs.forEach(input => {

        if (input.type === "file") return;

        if (input.tagName === "SELECT") {
            if (input.selectedIndex === 0) {
                valid = false;
            }
        } else {
            if (!input.value || input.value.trim() === "") {
                valid = false;
            }
        }

    if (input.type === "checkbox") {
            if (!input.checked) {
                valid = false;
            }
            return;
        }

    });

    if (nextBtn) {
        nextBtn.disabled = !valid;
    }
    }





    /* =============================
       NEXT BUTTON (FIXED VERSION)
    ============================= */
    document.querySelectorAll(".next-btn").forEach(btn => {

        btn.addEventListener("click", function () {

            const stepContainer = this.closest(".step");
            if (!stepContainer) return;

            const currentStep = stepContainer.id.replace("step-", "");
            const nextStep = this.dataset.next;

            simpanStep(currentStep, function (success) {
                if (success) {
                    pindahStep(nextStep);
                } else {
                    alert("Gagal menyimpan data.");
                }
            });
        });

    });

    /* =============================
       PREV BUTTON
    ============================= */
    document.querySelectorAll(".prev-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            pindahStep(this.dataset.prev);
        });
    });

    /* =============================
       PINDAH STEP
    ============================= */
    function pindahStep(step) {

    step = parseInt(step);

    document.querySelectorAll(".step").forEach(s => s.classList.add("d-none"));

    const activeStep = document.getElementById("step-" + step);
    activeStep?.classList.remove("d-none");

    sessionStorage.setItem(KEY_STEP, step);
    updateProgress(step);

    // === DISABLE TOMBOL KEMBALI DI STEP 2 ===
    const prevBtn = activeStep?.querySelector(".prev-btn");

    if (prevBtn) {
        if (step === 2) {
            prevBtn.disabled = true;
        } else {
            prevBtn.disabled = false;
        }
    }

    cekValidasi(step);
}

    document.addEventListener("input", function (e) {

        const target = e.target;

        if (!(target instanceof Element)) return;

        const stepElement = target.closest(".step");
        if (!stepElement) return;

        const stepNumber = stepElement.id.replace("step-", "");
        cekValidasi(stepNumber);
    });
    /* =============================
       PROGRESS BAR
    ============================= */
    function updateProgress(step) {
        const bar = document.getElementById("progressBar");
        if (!bar) return;

        const percent = Math.round((step / TOTAL_STEP) * 100);
        bar.style.width = percent + "%";
        bar.innerText = `Step ${step} dari ${TOTAL_STEP}`;
    }


    
    /* =============================
       NUMERIC FILTER
    ============================= */
    setNumeric(".nik-field", 16);
    setNumeric(".tahun-field", 4);
    setNumeric(".rt-rw-field", 2);

    function setNumeric(selector, max) {
        document.querySelectorAll(selector).forEach(input => {
            input.addEventListener("input", function () {
                this.value = this.value.replace(/\D/g, "").slice(0, max);
            });
        });
    }

    /* =============================
       SIMPAN STEP (CLEAN VERSION)
    ============================= */
    function simpanStep(step, callback) {

        const stepContainer = document.getElementById("step-" + step);
        if (!stepContainer) {
            callback(false);
            return;
        }

        const formData = new FormData();
        const idSiswa = document.getElementById("id_siswa")?.value;

        if (idSiswa) {
            formData.append("id_siswa", idSiswa);
        }

        const inputs = stepContainer.querySelectorAll("input, select, textarea");

        inputs.forEach(input => {

            if (!input.name || input.disabled) return;

            if (input.type === "checkbox") {
                formData.append(input.name, input.checked ? 1 : 0);
            } else {
                formData.append(input.name, input.value.trim());
            }
        });

        fetch(APP.baseUrl + "/siswa/simpan_step", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.status === "success") {

                if (data.id_siswa) {
                    document.getElementById("id_siswa").value = data.id_siswa;
                }

                callback(true);

            } else {
                callback(false);
            }
        })
        .catch(() => callback(false));
    }

});

