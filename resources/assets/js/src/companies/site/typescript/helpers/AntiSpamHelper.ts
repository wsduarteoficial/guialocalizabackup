export class AntiSpamHelper {
    
    public static antiSpam() {
        let random: any = Math.random();        
        localStorage.setItem('code-anti-spam', random);
        return ( document.querySelector('[data-js="anti-spam"]') as HTMLInputElement).value = random;
    }

}
