export function useGetQueryParameters(query_parameter) {
	return (new URLSearchParams(window.location.search)).get(query_parameter);
}
