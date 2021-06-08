export class Task {
    constructor(
        public id:number,
        public title: string,
        public status: string,
        public isCompleted:boolean,
        public categàry_id:number
    ) {}
}