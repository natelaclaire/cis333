# Repository Guidelines

## Project Structure & Module Organization
- Course content lives in Markdown files at the repo root (e.g., `index.md`, `syllabus.md`, `topics-by-week.md`).
- Weekly/class materials are grouped in `class-1/` through `class-13/` with descriptive `*.md` files.
- Static assets (images, screenshots) are stored in `images/`.
- Site configuration for GitHub Pages/Jekyll is in `_config.yml`.

## Build, Test, and Development Commands
- No formal build or test pipeline is defined in this repository.
- For local review, open Markdown files in a preview-capable editor, or use a Markdown viewer to verify formatting and links.

## Coding Style & Naming Conventions
- Use Markdown for all content; keep headings hierarchical and consistent.
- Prefer short, descriptive filenames with hyphens (e.g., `class-3-assignments.md`).
- For tutorial scripts, filenames start with the class number (e.g., `3`) followed by a dot, the video number, and a descriptive title (e.g., `3.1-intro-to-git.md`).
- Use relative links for internal navigation (e.g., `class-5/intro.md`).
- Use lowercase letters, numbers, hyphens, and underscores in filenames; avoid spaces and special characters.
- Use consistent heading styles (e.g., `##` for main sections, `###` for subsections).
- Indent lists with two spaces for wrapped lines and keep lines reasonably short for readability.

## Testing Guidelines
- No automated tests are present.
- Manually verify:
  - Links between pages (relative paths like `class-5/intro.md`).
  - Image references (e.g., `images/diagram.png`).
  - Headings and ordered lists render correctly in a Markdown preview.

## Commit & Pull Request Guidelines
- Follow the existing commit style: short, descriptive messages in sentence case (e.g., "Updated gitignore").
- For PRs, include a brief summary of changes and note which class or syllabus materials are affected.
- If you add or change assets, mention the file path(s) explicitly.

## Notes for Contributors
- Keep content aligned with the course term (e.g., Spring 2026) and update related syllabus or index pages when adding new materials.
- When introducing new class folders or files, mirror the existing `class-N/` structure to keep navigation predictable.
