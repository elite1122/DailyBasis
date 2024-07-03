// Define an array of quotes
const quotes = [
    {
      quote: "The only way to do great work is to love what you do.",
      author: "Steve Jobs"
    },
    {
      quote: "In the middle of every difficulty lies opportunity.",
      author: "Albert Einstein"
    },
    {
      quote: "The greatest glory in living lies not in never falling, but in rising every time we fall.",
      author: "Nelson Mandela"
    }
  ];
  
  // Get a random quote from the array
  function getRandomQuote() {
    return quotes[Math.floor(Math.random() * quotes.length)];
  }
  
  // Display the random quote
  function displayQuote() {
    const quoteContainer = document.querySelector('.quote-container');
    const quoteElement = quoteContainer.querySelector('.quote');
    const authorElement = quoteContainer.querySelector('.author');
  
    const randomQuote = getRandomQuote();
    quoteElement.textContent = randomQuote.quote;
    authorElement.textContent = `- ${randomQuote.author}`;
  }
  
  // Display a new random quote on page load
  window.addEventListener('load', displayQuote);
  