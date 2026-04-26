import { clsx } from "clsx";
import { twMerge } from "tailwind-merge";

/**
 * Menggabungkan class Tailwind dengan cerdas (menghindari konflik class)
 */
export function cn(...inputs) {
  return twMerge(clsx(inputs));
}