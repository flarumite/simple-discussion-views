declare module 'flarum/common/models/Discussion' {
	export default interface Discussion {
		canReset(): boolean;
        views(): number;
	}
}
