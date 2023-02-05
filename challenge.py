def factorial(n: int) -> int:
    result = 1
    if n > 0: 
        result *= n * factorial(n - 1)
    return result

factorial_y = factorial(5)
print(f"The factorial of y is: {factorial_y}")

