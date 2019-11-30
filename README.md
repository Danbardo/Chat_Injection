# Chat_Injection
 An example of Javascript injection which bypasses enterprise level Javascript sanitation. In this example the Javascript injected allows the user to toggle on/off a chat window within any website they desire.
 
![Example](/ChatInject.gif)

##How to use

Host the files on a domain, e.g. https://example.com.

Visit the domain and entire in the desire URL to load with the injected script.

Toggle the chat window on / off by holding CTRL and SHIFT.

##Why

A while back I used to work as a programmer within a large bank. While browsing the internet from within the banks network I noticed that all javascript related tags were being stripped from HTTP responses before they returned to my browser. While there were exceptions, for
example jQuery CDN's etc, it meant that many websites did not function properly.

My interest in the this sanitation lead me to find a bypass. As programmers, it was acceptable for us to visit programming related websites (e.g. Github) and somewhat unacceptable to use social media / external chat services. Just for fun I extended this bypass into simple chat room which staff could quickly toggle on / off while maintaining the appearance of working. 
