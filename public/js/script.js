// Event utama setelah DOM dimuat
document.addEventListener("DOMContentLoaded", () => {
    // === Smooth Scrolling dengan Offset ===
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

    // === Update Tahun Secara Dinamis di Footer ===
    const yearElement = document.getElementById("year");
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

    // === Toggle Menu untuk Mobile ===
    const menuToggle = document.getElementById("menu-toggle");
    if (menuToggle) {
        menuToggle.addEventListener("click", () => {
            const menu = document.getElementById("mobile-menu");
            if (menu) {
                menu.classList.toggle("hidden");
            }
        });
    }

    // === Chat Bubble dan Logika Chat ===
    const chatBubble = document.getElementById("chat-bubble");
    const chatWindow = document.getElementById("chat-window");
    const sendButton = document.getElementById("send-btn");
    const chatInput = document.getElementById("chat-input");
    const chatContent = document.getElementById("chat-content");

    if (chatBubble && chatWindow && sendButton && chatInput && chatContent) {
        // Toggle chat window saat bubble diklik
        chatBubble.addEventListener("click", () => {
            chatWindow.classList.toggle("hidden");
        });

        // Kirim pesan ke API
        sendButton.addEventListener("click", async () => {
            const userMessage = chatInput.value.trim();
            if (!userMessage) return;

            // Tampilkan pesan pengguna
            appendMessage(chatContent, userMessage, "user");

            // Bersihkan input
            chatInput.value = "";

            // Tampilkan loading
            const loadingElem = appendMessage(
                chatContent,
                "Loading...",
                "loading"
            );

            try {
                const response = await fetch(
                    `https://api.rifandavinci.my.id/aichat/gpt4?text=${encodeURIComponent(
                        userMessage
                    )}`
                );
                const data = await response.json();

                // Hapus loading
                removeElement(loadingElem);

                // Tampilkan respons dari bot
                if (data.result) {
                    appendMessage(chatContent, data.result, "bot");
                } else {
                    appendMessage(
                        chatContent,
                        "Error: Respons tidak valid.",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error:", error);

                // Hapus loading dan tampilkan pesan error
                removeElement(loadingElem);
                appendMessage(
                    chatContent,
                    "Terjadi kesalahan. Coba lagi nanti.",
                    "error"
                );
            }

            // Auto-scroll ke bawah
            chatContent.scrollTop = chatContent.scrollHeight;
        });
    }
});

// === Fungsi Tambahan ===

// Menambah pesan ke chat content
function appendMessage(container, message, type) {
    const messageElem = document.createElement("p");
    messageElem.textContent = message;

    switch (type) {
        case "user":
            messageElem.className = "text-right text-sm text-gray-800 mb-2";
            break;
        case "bot":
            messageElem.className = "text-left text-sm text-gray-800 mb-2";
            break;
        case "error":
            messageElem.className = "text-sm text-red-500";
            break;
        case "loading":
            messageElem.className = "text-sm text-gray-500 italic";
            break;
        default:
            messageElem.className = "text-sm";
    }

    container.appendChild(messageElem);
    return messageElem;
}

// Menghapus elemen tertentu
function removeElement(element) {
    if (element && element.parentNode) {
        element.parentNode.removeChild(element);
    }
}

// Fungsi untuk kembali ke halaman sebelumnya
function goBack() {
    window.history.back();
}
