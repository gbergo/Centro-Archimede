public class test 
{ 
    public static void stringReplace (String text) 
    {
        text = text.replace ('j' , 'c'); /* Line 5 */
    } 
    public static void bufferReplace (StringBuffer text) 
    { 
        text = text.append ("c");  /* Line 9 */
    } 
    public static void main (String args[]) 
    { 
        double i=100.5;

        System.out.println(Math.ceil(i));
    } 
}