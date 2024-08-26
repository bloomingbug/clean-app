import { defineConfig } from "vite";
import fs from "fs";
import laravel from "laravel-vite-plugin";
import path from "path";

function getFilesFromDirectory(directory, extension) {
    let files = [];

    fs.readdirSync(directory).forEach((file) => {
        const fullPath = path.join(directory, file);
        if (fs.statSync(fullPath).isDirectory()) {
            files = [...files, ...getFilesFromDirectory(fullPath, extension)];
        } else if (fullPath.endsWith(extension)) {
            files.push(fullPath);
        }
    });

    return files;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // ...getFilesFromDirectory("resources/css", ".css"),
                // ...getFilesFromDirectory("resources/css", ".scss"),
                ...getFilesFromDirectory("resources/js", ".js"),
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "./resources",
        },
    },
});
