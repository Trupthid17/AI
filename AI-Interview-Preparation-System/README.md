# AI Interview Preparation System

A PHP + MySQL + Groq-powered interview preparation platform where users can:
- sign up and log in
- choose interview categories
- generate questions with AI
- get answer suggestions
- practice and review scores

## Tech Stack
- HTML
- CSS
- JavaScript
- PHP
- MySQL
- Groq API

## Features
- User authentication
- Interview category selection
- AI-generated questions
- Suggested answer prompts
- Practice mode with answer submission
- Score and feedback generation
- Performance tracking

## Setup
1. Import the SQL schema from `database/schema.sql`
2. Edit `config/db.php` with your DB credentials
3. Run a PHP server in this project folder
4. Use the app through `index.php`

## Folder structure
```text
AI-Interview-Preparation-System/
├── api/
│   ├── generate_question.php
│   └── evaluate_answer.php
├── config/
│   └── db.php
├── database/
│   └── schema.sql
├── includes/
│   ├── auth.php
│   └── db.php
├── dashboard.php
├── index.php
├── practice.php
└── README.md
```

## Example API route
`/api/generate_question.php`

Input:
```json
{
  "category": "backend",
  "difficulty": "medium",
  "experience": "2 years"
}
```

Output:
```json
{
  "questions": [
    "Explain how you optimize database queries.",
    "How would you design a rate limiting system?"
  ]
}
```

## Next steps
- Add admin panel
- Add resume-based question generation
- Add timing and voice interview support
