export function useGetImageUrl(subPath) {
	return new URL(`../../images/${subPath}`, import.meta.url).href;
}
