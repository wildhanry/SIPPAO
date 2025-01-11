document.addEventListener("DOMContentLoaded", () => {
    // Smooth scrolling with adjustable offset
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    const scrollOffset = 80; // Sesuaikan offset ini (dalam piksel)

    smoothScrollLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const targetId = link.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                const targetPosition = targetElement.offsetTop - scrollOffset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth",
                });
            }
        });
    });

    // Update the year dynamically in the footer
    const yearElement = document.getElementById("year");
    if (yearElement) {
        const currentYear = new Date().getFullYear();
        yearElement.textContent = currentYear;
    }
});

function goBack() {
    window.history.back();
}

document.addEventListener("DOMContentLoaded", function () {
    const chatBubble = document.getElementById("chat-bubble");
    const chatWindow = document.getElementById("chat-window");
    const sendButton = document.getElementById("send-btn");
    const chatInput = document.getElementById("chat-input");
    const chatContent = document.getElementById("chat-content");

    // Toggle chat window ketika bubble diklik
    chatBubble.addEventListener("click", () => {
        chatWindow.classList.toggle("hidden");
    });

    // Kirim pesan ke API
    sendButton.addEventListener("click", async () => {
        const userMessage = chatInput.value.trim();
        if (!userMessage) return;

        // Tampilkan pesan pengguna
        const userMessageElem = document.createElement("p");
        userMessageElem.className = "text-right text-sm text-gray-800 mb-2";
        userMessageElem.textContent = userMessage;
        chatContent.appendChild(userMessageElem);
        chatInput.value = "";

        // Tampilkan loading
        const loadingElem = document.createElement("p");
        loadingElem.className = "text-sm text-gray-500 italic";
        loadingElem.textContent = "Loading...";
        chatContent.appendChild(loadingElem);

        try {
            const response = await fetch(
                "https://api.rifandavinci.my.id/aichat/gpt4?text=" +
                    encodeURIComponent(userMessage)
            );
            console.log("Response status:", response.status);
            const data = await response.json();
            console.log("Response data:", data);

            // Hapus loading jika masih ada
            if (loadingElem.parentNode) {
                chatContent.removeChild(loadingElem);
            }

            // Cek apakah respons valid (HARUS pakai `data.result`)
            if (data.result) {
                const botMessageElem = document.createElement("p");
                botMessageElem.className =
                    "text-left text-sm text-gray-800 mb-2";
                botMessageElem.textContent = data.result;
                chatContent.appendChild(botMessageElem);
            } else {
                const errorElem = document.createElement("p");
                errorElem.className = "text-sm text-red-500";
                errorElem.textContent = "Error: Respons tidak valid.";
                chatContent.appendChild(errorElem);
            }
        } catch (error) {
            console.error("Error:", error);

            // Hapus loading jika error
            if (loadingElem.parentNode) {
                chatContent.removeChild(loadingElem);
            }

            const errorElem = document.createElement("p");
            errorElem.className = "text-sm text-red-500";
            errorElem.textContent = "Terjadi kesalahan. Coba lagi nanti.";
            chatContent.appendChild(errorElem);
        }

        // Auto-scroll ke bawah
        chatContent.scrollTop = chatContent.scrollHeight;
    });
});
