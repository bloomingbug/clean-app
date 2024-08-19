import { defineConfig } from "vite";
import fs from "fs";
import laravel from "laravel-vite-plugin";
import path from "path";

function getFilesFromDirectory(directory) {
    let files = [];

    fs.readdirSync(directory).forEach((file) => {
        const fullPath = path.join(directory, file);
        if (fs.statSync(fullPath).isDirectory()) {
            files = [...files, ...getFilesFromDirectory(fullPath)];
        } else {
            files.push(fullPath);
        }
    });

    return files;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...getFilesFromDirectory("resources/css"),
                ...getFilesFromDirectory("resources/js"),
            ],
            refresh: true,
        }),
    ],
});
