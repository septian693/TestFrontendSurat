document
    .getElementById("login-form")
    .addEventListener("submit", async function (event) {
        event.preventDefault();

        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var errorMessage = document.getElementById("error-message");

        try {
            const response = await fetch("http://localhost:8000/api/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email, password }),
            });
            const data = await response.json();
            console.log(data);

            if (response.ok) {
                // Redirect based on user role
                sessionStorage.setItem("user", JSON.stringify(data));
            } else {
                errorMessage.textContent =
                    data.message || "Login gagal. Silakan coba lagi.";
                errorMessage.style.color = "red";
            }
        } catch (error) {
            console.error("Error:", error);
            errorMessage.textContent = "Terjadi kesalahan. Silakan coba lagi.";
            errorMessage.style.color = "red";
        }
    });
