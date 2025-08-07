📄 Invoice Parsing System with OTP-Based Login (PHP + MySQL)
🚀 Project Overview
This project is a secure Invoice Parsing System built using PHP, MySQL, HTML, CSS, and JavaScript, with a focus on OTP-based login instead of password authentication.

Users register with their name and email, receive a one-time password (OTP) for verification, and once verified, can upload invoices (PDF/Image) to extract key billing data.

🧩 Key Features
🔐 OTP-based login system with session handling (no passwords required)

📧 Email verification using PHPMailer + Gmail SMTP

📂 Invoice upload (image or PDF)

🔍 Invoice parsing using OCR (Tesseract or external APIs)

🧾 Data extraction: Invoice number, date, vendor, amount, GST

💾 MySQL storage of parsed invoice records

🛡️ Access control via PHP sessions (only verified users can upload/view invoices)

🧪 Tech Stack
Layer	Tech Used
Frontend	HTML, CSS, JavaScript
Backend	PHP (with PDO for database ops)
Auth	OTP via PHPMailer & Gmail SMTP
OCR Engine	Tesseract OCR (or Gemini API)
Database	MySQL
Session	PHP sessions

🧠 Why OTP-Based Login?
✅ No passwords to store or manage

✅ Enhanced security and simple user experience

✅ Works great for internal/admin tools

📁 Folder Structure (Core)
pgsql
Copy code
invoice-parser/
├── auth/                 # User registration & login (OTP)
├── includes/             # DB connection, session check
├── invoices/             # Uploaded files
├── upload_invoice.php    # Upload form + handler
├── parse_invoice.php     # OCR parsing logic
├── view_invoices.php     # Display parsed results
📌 How It Works
User registers with name + email

Receives OTP via email → enters OTP → logged in

Can upload invoice file

System reads invoice and extracts key data

Parsed data is shown on dashboard and saved to MySQL

✅ Ideal Use Cases
Internal billing automation

Admin tools to manage uploaded receipts

Educational project to demonstrate real-world PHP integration

