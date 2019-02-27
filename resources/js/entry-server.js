import { createApp } from "./app";
import renderVueComponentToString from "vue-server-renderer/basic";

renderVueComponentToString(createApp(), (err, res) => {
	print(res);
});
